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

Route::get('/', 'Service\DashboardController@getDashboard')->name('home');

//Route Admin
Route::group(['middleware' => 'App\Http\Middleware\Administrator'], function(){
    Route::get('/company', 'Admin\CompanyController@getCompany')->name('getCompany');
    Route::post('/company', 'Admin\CompanyController@postCompany')->name('postCompany');

    Route::get('/outlets', 'Admin\OutletsController@getOutlets')->name('getOutlets');

    Route::get('/outlets/new', 'Admin\OutletsController@getNewOutlets')->name('getNewOutlets');
});



Route::group(['middleware' => 'App\Http\Middleware\Users'], function(){
    Route::get('/service/new', 'Service\ServiceTrackingController@getNewOrder')->name('getNewOrder');
    Route::get('/service/acknowledgement', 'Service\ServiceTrackingController@getAcknowledgement')->name('getAcknowledgement');
});

Route::post('/changeTheme', 'HomeController@changeTheme')->name('changeTheme');
Route::get('/unauthorized', 'HomeController@unauthorized')->name('unauthorized');
