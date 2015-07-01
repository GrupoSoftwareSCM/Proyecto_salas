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
//Route::get('encar/asig','Encargado\EncarUserController@index');
//Route::get('encar/modif','Encargado\EncarUserController@Modificar');
//Route::get('encar/modif/salas','Encargado\SalasController@show');
//Route::get('encar/modif/salas/{id}','Encargado\SalasController@show');
Route::get('encar/ingre','Encargado\EncarUserController@index');
Route::get('encar/ingre/cursos','Encargado\EncarUserController@cursos');

      //SUB-RUTAS PARA EL INGRESO DE DATOS ACADEMICOS
      Route::get('/encar/ingre/cursos/agre','Encargado\EncarUserController@agrecurso');
    //  Route::get('/encar/ingre/cursos/modi','Encargado\EncarUserController@modicurso');
      Route::get('/encar/ingre/cursos/elim','Encargado\EncarUserController@elimcurso');
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
    //SUB-RUTAS PARA Modificar
	Route::get('adm/modif/perfuser','Administrador\AdmUserController@Modifperfuser');

	Route::get('adm/modif/camp', 'Administrador\AdmUserController@Modifcamp');
    Route::post('adm/modif/camp', 'Administrador\AdmUserController@Modifcamp');
    Route::post('adm/modif/camps', 'Administrador\AdmUserController@updateCamps');

    Route::get('adm/modif/Facultad', 'Administrador\AdmUserController@ModifFacult');
    Route::post('adm/modif/Facultad', 'Administrador\AdmUserController@ModifFacult');
    Route::post('adm/modif/Facultads', 'Administrador\AdmUserController@updateFacult');

	Route::get('adm/modif/encamp',  'Administrador\AdmUserController@Modifencamp');

    Route::get('adm/modif/Depto', 'Administrador\AdmUserController@ModifDepto');
    Route::post('adm/modif/Depto', 'Administrador\AdmUserController@ModifDepto');
    Route::post('adm/modif/Deptos', 'Administrador\AdmUserController@updateDepto');

    Route::get('adm/modif/Escuela', 'Administrador\AdmUserController@ModifEscuela');
    Route::post('adm/modif/Escuela', 'Administrador\AdmUserController@ModifEscuela');
    Route::post('adm/modif/Escuelas', 'Administrador\AdmUserController@updateEscuela');


Route::get('adm/Exportar','Administrador\AdmUserController@index');
Route::get('adm/crear',   'Administrador\AdmUserController@index');
	//SUB-RUTAS PARA CREAR
	Route::get('adm/crear/apui','Administrador\AdmUserController@crearApui');

	Route::post('asignarPerfilInd','Administrador\AdmUserController@storeAPUI');

	Route::get('adm/crear/apum','Administrador\AdmUserController@crearApum');

	Route::get('adm/crear/cc',  'Administrador\AdmUserController@crearCampus');
	Route::post('adm/crear/cc','Administrador\AdmUserController@storeCampus');

    Route::get('adm/crear/Facult', 'Administrador\AdmUserController@crearFacult');
    Route::post('adm/crear/Facult', 'Administrador\AdmUserController@crearFacult');
    Route::post('adm/crear/Facults', 'Administrador\AdmUserController@storeFacult');

    Route::get('adm/crear/Escuela', 'Administrador\AdmUserController@crearEscuela');
    Route::post('adm/crear/Escuela', 'Administrador\AdmUserController@crearEscuela');
    Route::post('adm/crear/Escuelas', 'Administrador\AdmUserController@storeEscuela');

    Route::get('adm/crear/Depto' , 'Administrador\AdmUserController@crearDepto');
    Route::post('adm/crear/Depto' , 'Administrador\AdmUserController@crearDepto');
    Route::post('adm/crear/Deptos' , 'Administrador\AdmUserController@storeDepto');

Route::get('adm/Eliminar','Administrador\AdmUserController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' =>  'adm', 'namespace' => 'Administrador', 'middleware' => 'auth'], function(){
    Route::resource('Campus','CampusController');

});

//PROBANDO RESOURCE PARA ASIGNATURAS

Route::group(['prefix' =>  'encar', 'namespace' => 'Encargado'], function(){
    Route::resource('asig/modi','asigController');
    Route::resource('estu/modi','estuController');
    Route::resource('curs/modi','cursController');
    Route::resource('salas/modi','salController');

});





