<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
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
Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/login', 'AuthController')->name('login');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');
Route::get('/forgot', 'AuthController@forgot')->name('forgot');
Route::post('/forgot', 'AuthController@forgot');
Route::get('/logout', 'AuthController@logout')->name('logout');



Route::get('/home', 'HomeController@index')->name('home');
Route::post('/getRoomsView', 'HomeController@getRoomsView');
Route::post('/signInUpByGoogle', 'AuthController@signInUpByGoogle');

Route::post('/videoWebhook', 'HomeController@videoWebhook');
Route::post('/messagePrevWebhook', 'HomeController@messagePrevWebhook');
Route::post('/messageWebhook', 'HomeController@messageWebhook');

Route::group(['middleware' => ['login']], function () {
    Route::get('/room/{room_id}', 'HomeController@room');
    Route::post('/addCharge', 'HomeController@addCharge');
    Route::post('/delCharge', 'HomeController@delCharge');
    Route::post('/addRoom', 'HomeController@addRoom');
    Route::post('/loadRoomState', 'HomeController@loadRoomState');
    Route::post('/updateToken', 'HomeController@updateToken');
    Route::post('/hookRoom', 'HomeController@hookRoom');
});

Route::group(['middleware' => ['login']], function () {
    Route::post('/developer', 'Util\\DbUtil@developer');
    Route::post('/notify/read', 'Util\\NotifyUtil@read');
});
