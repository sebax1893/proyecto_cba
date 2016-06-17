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


Route::resource('estudiantes','EstudianteController');
Route::resource('usuario','UsuarioController');
Route::resource('log','LogController');
Route::get('logout','LogController@logout');

