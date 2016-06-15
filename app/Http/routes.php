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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','FrontController@index');
Route::get('home','FrontController@home');

// Route::get('estudiantes','FrontController@estudiantes');
// Route::get('instituciones','FrontController@instituciones');

// Route::get('controlador','EstudiantesController@index');
// Route::get('name/{nombre}','EstudiantesController@nombre');

Route::resource('estudiantes','EstudianteController');

Route::resource('usuario','UsuarioController');
// Route::auth();
// Route::get('/home', 'HomeController@index');


// Route::group(['middleware' => 'web'], function () {
//     Route::auth();

//     Route::get('/home', 'HomeController@index');
// });

// Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
//     return view('welcome');;
// }]);