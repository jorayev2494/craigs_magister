<?php

use Illuminate\Support\Facades\Route;

// https://github.com/JeffreyWay/laravel-mix/issues/1783

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'debug', 'namespace' => 'Debug', 'as' => 'debug.'], static function(): void {
    Route::get('/web_socket', ['uses' => 'WebSocketController', 'as' => 'web_socket']);
    Route::get('/web_socket/test/{ws_text?}', ['uses' => 'WebSocketController@test', 'as' => 'web_socket.test']);
});
Route::get('/admin/{any}', 'ApplicationController')->where('any', '.*');
Route::get('/{any}', 'ApplicationController@index')->where('any', '.*');
