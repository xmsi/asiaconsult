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
	Route::get('/studentsM', 'StudentsMController@index');
	Route::resource('/countries', 'CountriesController');
	Route::resource('/universities', 'UniversityController');
	Route::resource('/filial', 'FilialsController');
	Route::resource('/faculty', 'FacultyController');
	Route::resource('/bossManager', 'BossManagersController');
	Route::resource('/manager', 'ManagerController');
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

Route::prefix('/cab')->group(function(){
	Route::get('/', 'AbiturController@main')->name('abiturcab');
	Route::get('/senddocs', 'AbiturController@senddocs');
	Route::post('/docs_receive', 'AbiturController@docs_receive');
});

// ------------------------------------------ Frontend Abitur panel -----------------------

Route::get('/registration', 'AbiturController@phone')->name('reg');
Route::get('/', 'AbiturController@signin')->name('logina');
Route::post('/signin', 'AbiturController@signin_receive');
Route::get('/university_select', 'AbiturController@university_select');
Route::post('/university_selected', 'AbiturController@university_selected');
Route::get('/worksheet/{phone}', 'AbiturController@worksheet');
Route::get('/sms/{phone}', 'AbiturController@sms');
Route::post('/', 'AbiturController@phone_recieve');
Route::post('/sms', 'AbiturController@sms_recieve');
Route::post('/worksheet', 'AbiturController@worksheet_receive');
Route::get('/docs_success', 'AbiturController@success');
Route::get('/docs_error', 'AbiturController@error');
Route::get('/dogovor', 'AbiturController@dogovor');