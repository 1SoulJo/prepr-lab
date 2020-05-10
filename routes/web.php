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

Route::get('/lab','LabsController@new');
Route::post('/lab','LabsController@create');

Route::get('/lab/{lab}','LabsController@open');
Route::post('/lab/{lab}','LabsController@update');

Route::get('/lab/{lab}','LabsController@open');

Route::post('/search', 'LabsController@search');
// Route::any('/search',function(){
//     $q = Input::get('q');
//     $labs = Lab::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
//     if(count($labs) > 0) {
//         return view('welcome')->withDetails($labs)->withQuery($q);
//     } else {
//         return view('welcome')->withMessage('No Details found. Try to search again !');
//     }
// });

Route::get('/map', 'MapController@index');