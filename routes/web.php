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
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/admin');
});

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');
Route::prefix('/admin')->group(function(){
	Route::get('/', 'AdminController@index');
	Route::resource('/countries', 'CountriesController');
	Route::resource('/universities', 'UniversityController');
	Route::resource('/faculty', 'FacultyController');
	Route::resource('/speciality', 'SpecialityController');
	Route::post('/speciality/faculty', 'SpecialityController@faculty');
	Route::prefix('/studentsT')->group(function(){
		Route::get('/', 'StudentsTController@index');
		Route::get('/{student}/edit', 'StudentsTController@edit');
		Route::put('/{student}', 'StudentsTController@update')->name('studentsT.update');
	});
	Route::prefix('/studentsU')->group(function(){
		Route::get('/', 'StudentsUController@index');
		Route::get('/{student}', 'StudentsUController@show');
		Route::get('/{student}/edit', 'StudentsUController@edit');
		Route::put('/{student}', 'StudentsUController@update')->name('studentsU.update');
	});
});

// ------------------------------------------ Frontend Abitur panel -----------------------

Route::get('/', 'AbiturController@phone');
Route::get('/university_select', 'AbiturController@university_select');
Route::get('/worksheet/{phone}', 'AbiturController@worksheet');
Route::get('/sms/{phone}', 'AbiturController@sms');
Route::post('/', 'AbiturController@phone_recieve');
Route::post('/sms', 'AbiturController@sms_recieve');
Route::post('/worksheet', 'AbiturController@worksheet_receive');