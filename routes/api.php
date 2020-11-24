<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.'], static function(): void {
    Route::post('/login', ['uses' => 'AuthController@login', 'as' => 'login']);
    Route::post('/register', ['uses' => 'AuthController@register', 'as' => 'register']);
    Route::post('/logout', ['uses' => 'AuthController@logout', 'as' => 'logout']) ;
    Route::get('/token/refresh', ['uses' => 'AuthController@refreshToken', 'as' => 'token_refresh']);
    Route::put('/email_confirmation', ['uses' => 'EmailConfirmationController', 'as' => 'email_confirmation']);

    Route::group(['prefix' => 'forgot_password', 'middleware' => 'guest', 'as' => 'forgot_password.'], static function() : void {
        Route::post('/email', ['uses' => 'ForgotPasswordController@sendResetTokenEmail', 'as' => 'send_reset_token_email']);
        Route::put('/reset', ['uses' => 'ForgotPasswordController@resetPassword', 'as' => 'reset_password']);
    });
});

Route::group(['middleware' => 'auth:user'], static function(): void {
    Route::group(['prefix' => 'profile', 'namespace' => 'Profile', 'as' => 'profile.'], static function(): void {
        Route::get('/', ['uses' => 'ProfileController@profileShow', 'as' => 'show']);
        Route::put('/', ['uses' => 'ProfileController@profileUpdate', 'as' => 'update']);
        Route::delete('/', ['uses' => 'ProfileController@profileDestroy', 'as' => 'delete']);
        Route::post('/', ['uses' => 'ProfileController@updateUserAvatar', 'as' => 'update.avatar']);
    });
});

