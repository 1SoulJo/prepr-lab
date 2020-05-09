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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'LabsController@index');

Auth::routes();

Route::get('/lab','LabsController@add');
Route::post('/lab','LabsController@create');

Route::get('/lab/{lab}','LabsController@edit');
Route::post('/lab/{lab}','LabsController@update');
