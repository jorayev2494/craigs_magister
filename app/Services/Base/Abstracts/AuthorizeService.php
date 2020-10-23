<?php

namespace App\Services\Base\Abstracts;

use App\Exceptions\AccessDenyException;
use App\Exceptions\AlreadyCreatedException;
use App\Exceptions\ApplicationException;
use App\Exceptions\BadRequestException;
use App\Exceptions\Interfaces\IErrorMessages;
use App\Exceptions\NotFoundException;
use App\Mail\Auth\PasswordResetEmail;
use App\Mail\Auth\RegistrationMail;
use App\Models\EmailConfirm;
use App\Models\EmailConfirmation;
use App\Models\Interfaces\IBaseUserModel;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Str;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class AuthorizeService extends BaseModelService 
{

    /**
     * @var Model|null
     */
    private ?Model $authUser;
    
    /**
     * Set Model Base guard
     *
     * @return string
     */
    abstract public function getGuard() : string;
    
    /**
     * Authorize Service register
     * 
     * @param array $data
     * @return array|null
     */
    public function register(array $data) : ?array
    {
        /**
         * @var object $emailConfirmation
         */
        $emailConfirmation = null;

        if ($this->getModelClone()->newQuery()->where('email', $data['email'])->first()) {
            throw new AlreadyCreatedException('User already exist');
        }

        DB::beginTransaction();
        try {
            if ($this->model instanceof IBaseUserModel) {
                $user = new $this->model($data);
                $user->save();
                
                if (!empty($user->email) && filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                    $emailConfirmation = EmailConfirmation::whereEmail($user->email)->first();

                    if ($emailConfirmation) {
                        $emailConfirmation->delete();
                    }

                    $confirmToken = Str::random($this->model::CONFIRM_TOKEN);
                    $emailConfirmation = EmailConfirmation::query()->create([
                                                                                'email' => $user->email,
                                                                                'token' => $confirmToken
                                                                            ]);

                    DB::commit();
                    $this->sendEmail($emailConfirmation, $user);
                } else {
                    throw new ApplicationException(IErrorMessages::SOMETHING_WENT_WRONG);
                }                
            } else {
                throw new ApplicationException('Base model must be implement ' . IBaseUserModel::class);
            }
        } catch (\Throwable $ex) {
            Log::info($ex->getMessage());
            DB::rollBack();
            throw new BadRequestException($ex->getMessage());
        }

        return config('app.debug') ? ['email_confirm_token' => $emailConfirmation->token ?? ''] : null;
    }

    /**
     * Authorize Service auth
     *
     * @param string $filedValue
     * @param string $password
     * @param string $searchField
     * @param boolean $remember
     * @return array
     */
    public function auth(string $filedValue, string $password, string $searchField = 'email', ?bool $remember = false) : array
    {
        $this->authUser = $this->getModelClone()->newQuery()->firstWhere($searchField, $filedValue);

        if (!$this->authUser) {
            throw new NotFoundException(IErrorMessages::USER_NOT_EXIST);
        }
        
        if (!Hash::check($password, $this->authUser->password)) {
            throw new BadRequestException(IErrorMessages::INVALID_CREDENTIALS);
        }

        if (isset($this->authUser->email_confirmed) && !$this->authUser->email_confirmed) {
            throw new AccessDenyException(IErrorMessages::EMAIL_NOT_CONFIRMED, Response::HTTP_FORBIDDEN);
        }

        // if (isset($this->authUser->blocked) && $this->authUser->blocked) {
        //     throw new AccessDenyException(IErrorMessages::USER_BLOCKED);
        // }

        return $this->generateTokenAndLogin([$searchField => $filedValue, 'password' => $password], $this->getGuard(), $remember);
    }

    /**
     * @param array $credentials
     * @param string $guard
     * @param boolean $remember
     * @return array
     */
    private function generateTokenAndLogin(array $credentials, string $getGuard = null, bool $remember = false) : array
    {
        if (!$token = Auth::guard($getGuard)->attempt($credentials)) {
            throw new BadRequestException(IErrorMessages::INVALID_CREDENTIALS);
        }

        $this->authUser->last_login = Carbon::now();
        $this->authUser->save();

        return ['access_token' => $token, 'user_data' => $this->authUser];
    }

    /**
     * Authorize Service logout
     *
     * @return boolean
     */
    public function logout() : bool
    {
        $this->authUser                 = Auth::guard($this->getGuard())->user();
        $this->authUser->last_activity  = Carbon::now();
        $this->authUser->save();

        Auth::guard($this->getGuard())->logout();
        unset($this->authUser);
        return true;
    }

    /**
     * Authorize Service confirmEmail
     *
     * @param string $token
     * @return boolean
     */
    public function confirmEmail(string $token) : bool
    {
        $emailConfirmation = EmailConfirmation::where('token', $token)->first();

        if (!$emailConfirmation) {
            throw new BadRequestException(IErrorMessages::INVALID_TOKEN);
        }

        $user = $this->getModelClone()->newQuery()->where('email', $emailConfirmation->email)->first();

        if (!$user) {
            throw new NotFoundException(IErrorMessages::USER_NOT_EXIST);
        }

        $user->email_confirmed = true;
        $user->save();

        return $emailConfirmation->delete();        
    }

    /**
     * Authorize Service sendRestToken
     *
     * @param string $email
     * @return array|null
     */
    public function sendResetToken(string $email) : ?array
    {
        $user = $this->getModelClone()->newQuery()->where('email', $email)->first();

        if (!$user) {
            throw new NotFoundException(IErrorMessages::USER_NOT_EXIST);
        }

        if ($user->email_confirmed == false) {
            throw new AccessDenyException(IErrorMessages::EMAIL_NOT_CONFIRMED);
        }

        $token = md5(uniqid('', true));
        
        PasswordReset::query()->where('email', $user->email)->delete();
        PasswordReset::query()->insert(['email' => $user->email, 'token' => $token]);

        if ($this->model instanceof IBaseUserModel) {
            Mail::to($user->email)->locale($this->model::DEFAULT_LANGUE)->queue(new PasswordResetEmail($user->email, $token, $this->getGuard()));
        }

        return config('app.debug') ? ['password_reset_token' => $token] : null;        
    }

    /**
     * Authorize Service resetPassword
     *
     * @param string $token
     * @param string $newPassword
     * @return boolean
     */
    public function resetPassword(string $token, string $newPassword) : bool
    {
        $resetPassword = PasswordReset::query()->where('token', $token)->first();

        if (!$resetPassword) {
            throw new NotFoundException(IErrorMessages::INVALID_TOKEN);
        }

        /**
         * @var \App\Models\Abstracts\JWTAuthModel $user
         */
        $user = $this->getModelClone()->newQuery()->firstWhere('email', $resetPassword->email);

        if (!$user) {
            throw new NotFoundException(IErrorMessages::USER_NOT_EXIST);
        }

        $user->password = $newPassword;
        $user->active   = false;
        // $user->save();
        $user->invalidateToken();

        return PasswordReset::query()->where('token', $token)->delete();
    }

    /**
     * Authorize Service tokenRefresh
     *
     * @param Request $request
     * @return array
     */
    public function tokenRefresh(Request $request) : array
    {
        if (!$token = JWTAuth::setRequest($request)->getToken()) {
            throw new BadRequestException(IErrorMessages::TOKEN_NOT_PROVIDED);
        }

        try {
            $user = JWTAuth::authenticate();
        } catch (TokenExpiredException $ex) {
            try {
                $newToken = JWTAuth::retRequest($request)->parseToken()->refresh();
                $user = JWTAuth::setToken($newToken)->authenticate();
                if ($user && $user->active) {
                    return ['token' => $newToken];
                } else {
                    throw new AccessDenyException(IErrorMessages::TOKEN_EXPIRED);
                }
            } catch (JWTException $ex) {
                throw new BadRequestException(IErrorMessages::TOKEN_INVALID);
            }
        }

        return ['token' => JWTAuth::getToken()->get()];
    }

    protected function sendEmail(EmailConfirmation $emailConfirmation, Model $user) : void
    {
        if ($this->model instanceof IBaseUserModel) {
            Mail::to($user->email)->locale($this->model::DEFAULT_LANGUE)->queue(new RegistrationMail($emailConfirmation, $user, $this->getGuard()));
        } else {
            throw new ApplicationException('Base model must be implement ' . IBaseUserModel::class);
        }
    }
}