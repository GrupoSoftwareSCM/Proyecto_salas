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
Route::get('doc/clases','Docente\DocUserController@clases');
Route::get('doc/salas','Docente\DocUserController@clases');

//RUTAS PARA EL ENCARGADO DE CAMPUS
Route::get('encar','Encargado\EncarUserController@index');
Route::get('encar/asig','Encargado\EncarUserController@index');
Route::get('encar/modif','Encargado\SalasController@index');
Route::post('encar/modif','Encargado\SalasController@index');
Route::post('encar/modif','Encargado\EncarUserController@Modificar');
Route::get('encar/modif','Encargado\EncarUserController@Modificar');
Route::get('encar/ingre','Encargado\EncarUserController@index');
Route::get('encar/ingre/cursos','Encargado\EncarUserController@cursos');
Route::get('encar/ingre/asig','Encargado\EncarUserController@asig');
Route::get('encar/ingre/estu','Encargado\EncarUserController@estu');
      //SUB-RUTAS PARA EL INGRESO DE DATOS ACADEMICOS
      Route::get('/encar/ingre/cursos/agre','Encargado\EncarUserController@agrecurso');
      Route::get('/encar/ingre/cursos/modi','Encargado\EncarUserController@modicurso');
      Route::get('/encar/ingre/cursos/elim','Encargado\EncarUserController@elimcurso');
      Route::get('/encar/ingre/asig/agre','Encargado\EncarUserController@agreasig');
      Route::get('/encar/ingre/asig/modi','Encargado\EncarUserController@modiasig');
      Route::get('/encar/ingre/asig/elim','Encargado\EncarUserController@elimasig');
      Route::get('/encar/ingre/estu/agre','Encargado\EncarUserController@agreestu');
      Route::get('/encar/ingre/estu/modi','Encargado\EncarUserController@modiestu');
      Route::get('/encar/ingre/estu/elim','Encargado\EncarUserController@elimestu');
      


//RUTAS PARA EL ALUMNOS
Route::get('alum',        'Alumnos\AlumUserController@index');
Route::get('alum/horario','Alumnos\AlumUserController@index');
Route::get('alum/salas',  'Alumnos\AlumUserController@index');

//RUTAS PARA EL ADMINISTRADOR
Route::get('adm',         'Administrador\AdmUserController@index');
Route::get('adm/modif',   'Administrador\AdmUserController@index');
	Route::get('adm/modif/perfuser','Administrador\AdmUserController@perfuser');
	Route::get('adm/modif/camp',    'Administrador\AdmUserController@camp');
	Route::get('adm/modif/encamp',  'Administrador\AdmUserController@encamp');
Route::get('adm/archivar','Administrador\AdmUserController@index');
Route::get('adm/crear',   'Administrador\AdmUserController@index');
	//SUB-RUTAS PARA CREAR
	Route::get('adm/crear/apui','Administrador\AdmUserController@apui');

	Route::post('asignarPerfilInd','Administrador\AdmUserController@storeAPUI');

	Route::get('adm/crear/apum','Administrador\AdmUserController@apum');

	Route::get('adm/crear/cc',  'Administrador\AdmUserController@cc');
	Route::post('adm/crear/cc','Administrador\AdmUserController@storeCC');

	Route::get('adm/crear/aec', 'Administrador\AdmUserController@aec');

    Route::get('adm/crear/Facult', 'Administrador\AdmUserController@Facult');
    Route::post('adm/crear/Facult', 'Administrador\AdmUserController@Facult');
    Route::post('adm/crear/Facults', 'Administrador\AdmUserController@storeFacult');

    Route::get('adm/crear/Escuela', 'Administrador\AdmUserController@Escuela');

    Route::get('adm/crear/Depto' , 'Administrador\AdmUserController@Depto');
    Route::post('adm/crear/Depto' , 'Administrador\AdmUserController@Depto');
    Route::post('adm/crear/Deptos' , 'Administrador\AdmUserController@storeDepto');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
