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

Auth::routes();

Route::get('/', 'LabsController@index');

Auth::routes();

Route::get('/lab','LabsController@new');

Route::post('/lab','LabsController@create');

Route::get('/lab/{lab}','LabsController@open');

Route::post('/lab/{lab}','LabsController@update');

Route::get('/lab/{lab}','LabsController@open');

Route::post('/search', 'LabsController@search');

Route::get('/map', 'MapController@index');