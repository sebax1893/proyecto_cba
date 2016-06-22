<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','FrontController@index');
Route::get('home','FrontController@home');
Route::get('login','FrontController@login');
Route::post('institucion/prueba', 'InstitucionController@prueba');

Route::resource('estudiante','EstudianteController');
Route::resource('usuario','UsuarioController');
Route::resource('tipoDocumento','TipoDocumentoController');
Route::resource('eps','EpsController');
Route::resource('tipoBanda','TipoBandaController');
Route::resource('categoria','CategoriaController');
Route::resource('institucion','InstitucionController');
Route::resource('banda','BandaController');

Route::resource('log','LogController');
Route::get('logout','LogController@logout');

