<?php

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

Route::get('/', ['uses' => 'AdminController@admin', 'as' => 'index']);

Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.'], static function(): void {
    Route::post('/login', ['uses' => 'AuthController@login', 'as' => 'login']);
    Route::post('/register', ['uses' => 'AuthController@register', 'as' => 'register']);
    Route::post('/logout', ['uses' => 'AuthController@logout', 'as' => 'logout']);
    Route::get('/token/refresh', ['uses' => 'AuthController@refreshToken', 'as' => 'token_refresh']);
    Route::put('/email_confirmation', ['uses' => 'EmailConfirmationController', 'as' => 'email_confirmation']);

    Route::group(['prefix' => 'forgot_password', 'middleware' => 'guest', 'as' => 'forgot_password.'], static function(): void {
        Route::post('/email', ['uses' => 'ForgotPasswordController@sendResetTokenEmail', 'as' => 'send_reset_token_email']);
        Route::put('/reset', ['uses' => 'ForgotPasswordController@resetPassword', 'as' => 'reset_password']);
    });
});


Route::group(['middleware' => 'auth:admin'], static function(): void {    
    Route::group(['prefix' => 'managements', 'namespace' => 'Management', 'as' => 'management.'], static function(): void {
        Route::apiResource('/announcements', 'Announcement\AnnouncementController', ['except' => ['store']]);
        Route::put('/announcements/change_status/{id}', ['uses' => 'Announcement\AnnouncementChangeStatusController', 'as' => 'change_status']);
        Route::apiResource('/users', 'UserController', ['except' => ['store']]);
        Route::post('/users/update_avatar/{id}', ['uses' => 'UserController@updateUserAvatar', 'as' => 'users.update.user_avatar']);
    });

    Route::apiResource('recent_activities', 'RecentActivityController', ['only' => ['index', 'show']]);

    Route::apiResource('/blogs', 'BlogController');
});