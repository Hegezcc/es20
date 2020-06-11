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

Route::get('/', function () {
    return redirect('/information');
});

// Information
Route::get('/information', 'HomeController@showDiningOptions')->name('information');

// Booking routes
Route::get('/booking/start', 'BookingController@startBooking')->name('booking.start');
Route::post('/booking/start', 'BookingController@saveBookingContact')->name('booking.contact');

Route::get('/booking/request', 'BookingController@getBookingOptions')->name('booking.request');
Route::post('/booking/request', 'BookingController@saveBookingOptions');

Route::get('/booking/confirmation', 'BookingController@bookingConfirmation')->name('booking.confirmation');

// Management routes
Route::get('/management', 'ManagementController@getReservations')->name('management');
