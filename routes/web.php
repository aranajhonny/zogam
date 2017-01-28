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
    return view('index');
});

Auth::routes();

Route::get('/dashboard', 'VehiculoController@index');

Route::resource('vehiculo', 'VehiculoController');

Route::resource('images', 'ImagesController');

Route::resource('images-rev', 'ImageRevController');

Route::resource('revisiones', 'RevisionController');