<?php

namespace App\Http\Requests\Admin\Auth;

use App\Http\Requests\Abstracts\APIFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ResetPasswordRequest extends APIFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return Auth::guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'token'     => 'required|exists:password_resets,token',
            'password'  => 'required|confirmed',
        ];
    }
}
