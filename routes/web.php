<?php

Auth::routes();

Route::get('/home', 'VehiculoController@index');

Route::get('/auto', function(){
  return view('index');
});

Route::resource('vehiculo', 'VehiculoController');

Route::resource('images', 'ImagesController');

Route::resource('images-rev', 'ImageRevController');

Route::resource('revisiones', 'RevisionController');

Route::get('revision/{id}', 'RevisionController@index');

Route::post('upload', 'UploadController@upload');

Route::get('mivehiculo/{placa}', 'UploadController@mivehiculo');

Route::get('getimages/{placa}', 'UploadController@getImages');
