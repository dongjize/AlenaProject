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
    Route::get('/customer/update', 'CustomerController@update');
    Route::post('/customer/update', 'CustomerController@store');

    Route::get('/appointments', 'AppointmentBookingController@index');
    Route::post('/appointments/create', 'AppointmentBookingController@store');
    Route::get('/appointments/email', 'AppointmentBookingController@email');

    Route::get('/professionals', 'ProfessionalController@index');
    Route::get('/professionals/{professional}', 'ProfessionalController@show');
});


Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\LoginController@index');
    Route::post('/login', 'Admin\LoginController@login');
    Route::get('/logout', 'Admin\LoginController@logout');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/home', 'Admin\HomeController@index');
        Route::get('/appointments', 'Admin\AppointmentBookingController@index');
        Route::resource('/professionals', 'Admin\ProfessionalController');
    });
});
