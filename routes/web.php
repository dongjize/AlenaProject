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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return view('welcome');
});

// register
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@register');

// login
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');

Route::group(['middleware' => 'auth:web'], function () {
    // logout
    Route::get('/logout', 'LoginController@logout');

    // customer settings
    Route::get('customer/me/settings', 'CustomerController@settings');
    Route::post('customer/me/settings', 'CustomerController@settingsStore');

    Route::get('appointments', 'AppointmentBookingController@index');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\LoginController@index');
    Route::post('/login', 'Admin\LoginController@login');
    Route::get('/logout', 'Admin\LoginController@logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/home', 'Admin\HomeController@index');
        Route::get('/professionals', 'Admin\ProfessionalController@index');
        Route::get('/professionals/create', 'Admin\ProfessionalController@create');
        Route::post('/professionals/store', 'Admin\ProfessionalController@store');
        Route::get('/professionals/{professional}', 'Admin\ProfessionalController@show');
        Route::get('appointments', 'Admin\AppointmentBookingController@index');
    });
});
