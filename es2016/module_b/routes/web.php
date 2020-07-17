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
    return redirect('/ITTECHSurveys/');
})->name('root');

Route::prefix('ITTECHSurveys')->group(function() {
    Route::get('/', 'SurveyController@index')->name('index');

    Route::get('/survey/new', 'SurveyController@getNewSurvey')->name('newSurvey');
    Route::post('/survey/new', 'SurveyController@postNewSurvey');

    Route::get('/survey/{identification}', 'SurveyController@getSurvey')->name('survey');
    Route::post('/survey/{identification}', 'SurveyController@postSurveyFill');

    Route::get('/survey/{identification}/auth', 'SurveyController@getSurveyAuth')->name('auth');
    Route::post('/survey/{identification}/auth', 'SurveyController@postSurveyAuth');

    Route::get('/manage/{identification}', 'ManageController@getSurvey')->name('manage');

    Route::get('/manage/{identification}/auth', 'ManageController@getAuth')->name('manage.auth');
    Route::post('/manage/{identification}/auth', 'ManageController@postAuth');

    Route::get('/logout', 'ManageController@logout')->name('logout');

    Route::get('/manage/{identification}/delete', 'ManageController@getDelete')->name('manage.delete');
    Route::post('/manage/{identification}/delete', 'ManageController@postDelete');
});
