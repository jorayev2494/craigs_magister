<?php

namespace App\Exceptions;

use App\Exceptions\Interfaces\IErrorMessages;
use App\Traits\ErrorFormatResponse;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{

    use ErrorFormatResponse;

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function render($request, Throwable $exception)
    {

        // dd($exception->getMessage());

        if ($exception instanceof AlreadyCreatedException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_FORBIDDEN);
        }

        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            $modelName = Arr::last(explode('\\', $exception->getModel()));

            return response($this->errorResponse("${modelName} not found"), Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof NotFoundException) {
            return response($this->errorResponse($exception->getMessage()), Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response($this->errorResponse(IErrorMessages::HTTP_NOT_FOUND), Response::HTTP_NOT_FOUND);
        }

        // dd($exception->getMessage());

        if ($exception instanceof Exception) {
            logger($exception->getTraceAsString());

            $HTTP_CODES = array_values(Response::$statusTexts);
            $ERROR_CODE = in_array($exception->getCode(), $HTTP_CODES, true) ? $exception->getCode() : Response::HTTP_INTERNAL_SERVER_ERROR;

            return response($this->errorResponse($exception->getMessage()), $ERROR_CODE);
        }

        return parent::render($request, $exception);
    }
}
