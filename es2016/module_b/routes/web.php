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
    return redirect()->route('index');
})->name('base');

Route::prefix('ITTECHSurveys')->group(function() {
    Route::get('/', 'SurveyController@getIndex')->name('index');

    Route::get('/new', 'SurveyController@getNewSurvey')->name('newSurvey');
    Route::post('/new', 'SurveyController@postNewSurvey');

    Route::get('/survey/{identification}', 'SurveyController@getSurvey')->name('survey');
    Route::post('/survey/{identification}', 'SurveyController@postSurvey');
    Route::get('/survey/{identification}/auth', 'SurveyController@getAuth')->name('surveyauth');
    Route::post('/survey/{identification}/auth', 'SurveyController@postAuth');

    Route::get('/manage/{identification}', 'ManageController@getSurvey')->name('manage');
    Route::get('/manage/{identification}/auth', 'ManageController@getAuth')->name('manageauth');
    Route::post('/manage/{identification}/auth', 'ManageController@postAuth');

    Route::get('/manage/{identification}/delete', 'ManageController@getDeleteSurvey')->name('delete');
    Route::post('/manage/{identification}/delete', 'ManageController@postDeleteSurvey');

    Route::get('/logout', 'ManageController@logout')->name('logout');
});
