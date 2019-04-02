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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('profile/update/{id}', 'HomeController@profileUpdate')->name('profileUpdate');

Route::resource('vacation_types', 'VacationTypeController');
Route::get('vacation_types/edit/{id}', 'VacationTypeController@edit');
Route::post('vacation_types/update/{id}', 'VacationTypeController@update');
Route::get('vacation_types/delete/{id}', 'VacationTypeController@destroy');
Route::get('vacation_types/create', 'VacationTypeController@create');
Route::post('vacation_types/store', 'VacationTypeController@store');


Route::resource('vacations', 'VacationController');
Route::get('vacations/edit/{id}', 'VacationController@edit');
Route::post('vacations/update/{id}', 'VacationController@update');
Route::get('vacations/delete/{id}', 'VacationController@destroy');
Route::get('vacations/create', 'VacationController@create');
Route::post('vacations/store', 'VacationController@store');
Route::get('vacations/approve/{id}', 'VacationController@approve');
Route::get('vacations/reject/{id}', 'VacationController@rejectVacation');
Route::post('vacations/reject/{id}', 'VacationController@reject');
