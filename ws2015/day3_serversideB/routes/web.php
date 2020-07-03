<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'BookingController@getInformation')->name('information');

Route::get('/booking/reservation', 'BookingController@getReservation')->name('booking.reservation');
Route::post('/booking/reservation', 'BookingController@postReservation');
Route::get('/booking/guests', 'BookingController@getGuests')->name('booking.guests');
Route::post('/booking/guests', 'BookingController@postGuests');
Route::get('/booking/confirmation', 'BookingController@getConfirmation')->name('booking.confirmation');

Route::get('/management', 'ManagementController@getManagement')->name('management');
Route::post('/management', 'ManagementController@postManagement');
