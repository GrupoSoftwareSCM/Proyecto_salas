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

Route::controller('files','Excel\FilesController',[
    'getCampus'                 => 'files.Campus',
    'getCampusall'              => 'files.Campusall',
    'postUpcampusfiles'         => 'files.campus.Up',
    'getFacultad'               => 'files.Facultad',
    'getFacultadall'            => 'files.Facultadall',
    'postUpfacultadfiles'       => 'files.facultad.up',
    'getDepartamento'           => 'files.Departamento',
    'getDepartamentoall'        => 'files.Departamentoall',
    'postUpdepartamentosfiles'  => 'files.departamento.up',
    'getEscuela'                => 'files.Escuela',
    'getEscuelall'              => 'files.Escuelall',
    'postUpescuelafiles'        => 'files.Escuela.up',
    'getTposala'                => 'files.Tposala',
    'getTposalall'              => 'files.Tposalall',
    'postTposalafiles'          => 'files.Tposala.up',
    'getSala'                   => 'files.Sala',
    'getSalall'                 => 'files.Salall',
    'postSalafiles'             => 'files.Salas.up',
    'getAdministrador'          => 'files.Administrador',
    'getAdministradorall'       => 'files.Administradorall',
    'postAdministradorfiles'    => 'files.Administrador.up',
    'getCarrera'                => 'files.Carrera',
    'getCarrerall'              => 'files.Carrerall',
    'postCarrerafiles'          => 'files.Carrera.up',

]);

Route::controller('auth', 'Auth\AuthController', [
    'getLogin'  => 'auth.login',
    'postLogin' => 'auth.doLogin',
    'getLogout' => 'auth.logout'
]);


Route::get('/home', ['as' => 'home', 'middleware' => ['auth', 'redir'], function(){
    return 'home';
}]);

Route::group(['middleware' =>'admin','prefix' =>  'Admin', 'namespace' => 'Administrador'], function(){
//Route::group(['prefix' =>  'Admin', 'namespace' => 'Administrador'], function(){
    Route::resource('home','AdmUserController');
    Route::resource('Campus','CampusController'); //CRUD PARA CAMPUS
    Route::resource('Facultad','FacultadController'); //CRUD PARA Facultad
    Route::resource('Depto','DepartamentoController'); //CRUD PARA Depto
    Route::resource('Escuela','EscuelaController'); //CRUD PARA Escuela
    Route::resource('TpoSala','TipoSalasController'); //CRUD PARA TIPOS DE SALA
    Route::resource('Salas','SalasController'); //CRUD PARA SALA
    Route::resource('Carrera','CarreraController');

    Route::resource('Administrador','AdministradorController');
    Route::resource('EncargadoCampus','EncargadoCampusController');
    Route::resource('Alumno','AlumnoController');
    Route::resource('Docente','DocenteController');
    Route::resource('Funcionario','FuncionarioController');
});


//PROBANDO RESOURCE PARA ASIGNATURAS

Route::group(['middleware' => 'Encar','prefix' =>  'encar', 'namespace' => 'Encargado'], function(){
    Route::resource('asig/modi','asigController');
    Route::resource('estu/modi','estuController');
    Route::resource('curs/modi','cursController');
    Route::resource('salas/modi','SalasController');
    Route::resource('home','EncarUserController');
    Route::resource('asignar/modi','AsignarSalasController');
    Route::resource('doce/modi','DocenteController');


    });


Route::resource('users/encargados', 'Encargado\EncarUserController');

