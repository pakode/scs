<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => 'App\Http\Middleware\Users'], function(){
    Route::get('/service/new', 'ServiceTrackingController@getNewOrder')->name('getNewOrder');
    Route::get('/service/acknowledgement', 'ServiceTrackingController@getAcknowledgement')->name('getAcknowledgement');

});

Route::post('/changeTheme', 'HomeController@changeTheme')->name('changeTheme');
Route::get('/unauthorized', 'HomeController@unauthorized')->name('unauthorized');
