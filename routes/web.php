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

// About Routes and Controllers

// Route::get('/', 'MainController@home')->name('mainpage');
// Route::get('a', 'MainController@a')->name('apage');
// Route::get('testing', 'MainController@testing')->name('testingpage');

// Working with template using bootstrap

Route::get('/', 'MyController@home')->name('homepage');
Route::get('about', 'MyController@about')->name('aboutpage');
Route::get('contact', 'MyController@contact')->name('contactpage');

// Working with data in blade file
Route::get('service', 'MainController@service')->name('servicepage');

// CRUD for student table
Route::resource('student','StudentController'); // resource (get - / post/ put/ delete)