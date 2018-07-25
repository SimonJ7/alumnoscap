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


Route::get('/', 'IndexController@index');


Route::get('/usuarios', 'UsersController@index');
Route::get('/loadData', 'UsersController@loadData')->name('loadData');;

Route::get('/usuarios/nuevo', 'UsersController@create');
Route::post('/usuarios/guardar', 'UsersController@store');

Route::get('/usuarios/editar/{id_user}', 'UsersController@edit');
Route::post('/usuarios/actualizar', 'UsersController@update');

Route::get('/usuarios/eliminar/{id_user}', 'UsersController@destroy');

Route::get('/usuarios/asignar/{id_user}', 'UsersController@assign');
Route::post('/usuarios/grabar', 'UsersController@record');


