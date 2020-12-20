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

Route::group(['prefix' => 'server', 'namespace' => 'Server'], static function(): void {
    Route::get('/countries', ['uses' => 'ServerPublicDataController@countries']);
    Route::get('/cities', ['uses' => 'ServerPublicDataController@cities']);
    Route::get('/categories', ['uses' => 'ServerPublicDataController@categories']);
    Route::get('/announcements/price_permissions', ['uses' => 'ServerPublicDataController@pricePer']);
});

Route::get('/users/{id}', ['uses' => 'UserController', 'as' => 'user']);

Route::get('/announcements', ['uses' => 'AnnouncementController@index', 'as' => 'announcements']);
Route::get('/announcements/{id}', ['uses' => 'AnnouncementController@show', 'as' => 'announcements.show']);

Route::get('/blogs', ['uses' => 'BlogController@index', 'as' => 'blogs']);
Route::get('/blogs/{id}', ['uses' => 'BlogController@show', 'as' => 'blogs.show']);

// Route::post('/send_message_creator/{id}', ['uses' => 'CreatorMessageController@send', 'as' => 'send_message_creator']);
Route::post('/send_message_creator/{id}', ['uses' => 'CreatorMessageController@send', 'as' => 'send_message_creator']);