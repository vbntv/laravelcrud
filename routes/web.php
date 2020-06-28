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
/*
Route::get('/', function () {
    return view('home');
})->name('home');;



Route::get('create-student', function () {
    return view('create-student');
})->name('create-student-page');

Route::post('students/create', 'StudentsController@create')->name('create-student-form');
Route::get('students/show', 'StudentsController@show')->name('students-data');
Route::get('students/show/{id}', 'StudentsController@showProfile')->name('students-profile');
Route::get('students/find', 'StudentsController@find')->name('find');


Route::get('create-class', function () {
    return view('create-class');
})->name('create-class-page');
Route::post('classes/create', 'ClasController@create')->name('create-class-form');
Route::get('classes/show', 'ClasController@show')->name('classes-data');

Route::get('students', 'StudentsController@showap')->name('students');
*/


//Route::get('/{any}', 'MainController@index')->where('any', '.*');

Route::get('/{any}', 'MainController@index')->where('any', '.*');





