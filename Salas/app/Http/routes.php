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

//Route::get('/', 'WelcomeController@index');

Route::get('/', 'HomeController@index');

Route::get('adm','Administrador\AdmUserController@index');

Route::get('alum','Alumnos\AlumUserController@index');
Route::get('alum/horario','Alumnos\AlumUserController@horario');
Route::get('alum/salas','Alumnos\AlumUserController@salas');

Route::get('adm/modif','Administrador\AdmUserController@index');
Route::get('adm/archivar','Administrador\AdmUserController@index');
Route::get('adm/crear','Administrador\AdmCrearController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
