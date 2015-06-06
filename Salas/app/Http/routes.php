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

//RUTAS PARA EL DOCENTE
Route::get('doc','Docente\DocUserController@index');
Route::get('doc/clases','Docente\DocUserController@index');
Route::get('doc/salas','Docente\DocUserController@index');

//RUTAS PARA EL ENCARGADO DE CAMPUS
Route::get('encar','Encargado\EncarUserController@index');
Route::get('encar/asig','Encargado\EncarUserController@index');
Route::get('encar/modif','Encargado\EncarUserController@index');
Route::get('encar/ingre','Encargado\EncarUserController@index');
Route::get('encar/ingre/cursos','Encargado\EncarUserController@cursos');
Route::get('encar/ingre/asig','Encargado\EncarUserController@asig');
Route::get('encar/ingre/estu','Encargado\EncarUserController@estu');

//RUTAS PARA EL ALUMNOS
Route::get('alum',        'Alumnos\AlumUserController@index');
Route::get('alum/horario','Alumnos\AlumUserController@index');
Route::get('alum/salas',  'Alumnos\AlumUserController@index');

//RUTAS PARA EL ADMINISTRADOR
Route::get('adm',         'Administrador\AdmUserController@index');
Route::get('adm/modif',   'Administrador\AdmUserController@index');
Route::get('adm/archivar','Administrador\AdmUserController@index');
Route::get('adm/crear',   'Administrador\AdmUserController@index');
	//SUB-RUTAS PARA CREAR
	Route::get('adm/crear/apui','Administrador\AdmUserController@apui');
	Route::get('adm/crear/apum','Administrador\AdmUserController@apum');
	Route::get('adm/crear/cc',  'Administrador\AdmUserController@cc');
	Route::get('adm/crear/aec', 'Administrador\AdmUserController@aec');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
