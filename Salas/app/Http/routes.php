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

Route::controllers([
    //'auth' => 'Auth\AuthController',
    //'password' => 'Auth\PasswordController',
    'admin' => 'Login\LoginAdminController',
]);

Route::get('/', function(){
    return redirect('/admin/login');
});

Route::group(['middleware' => 'admin', 'prefix' =>  'Admin', 'namespace' => 'Administrador'], function(){
    Route::resource('home','AdmUserController');
    Route::resource('Campus','CampusController'); //CRUD PARA CAMPUS
    Route::resource('Facultad','FacultadController'); //CRUD PARA Facultad
    Route::resource('Depto','DepartamentoController'); //CRUD PARA Depto
    Route::resource('Escuela','EscuelaController'); //CRUD PARA Escuela
    Route::resource('TpoSala','TipoSalasController'); //CRUD PARA TIPOS DE SALA
    Route::resource('Salas','SalasController'); //CRUD PARA SALA
    Route::resource('downloadCampus','MasivoCampusController');
    //Route::resource('Roluser','RolusuarioController');
});


//PROBANDO RESOURCE PARA ASIGNATURAS

Route::group(['prefix' =>  'encar', 'namespace' => 'Encargado'], function(){
    Route::resource('asig/modi','asigController');
    Route::resource('estu/modi','estuController');
    Route::resource('curs/modi','cursController');
    Route::resource('salas/modi','SalasController');
    Route::resource('home','EncarUserController');
    Route::get('salas/modi/{id}', function(App\Sala $id)
        {
    //
});


});


//PROBANDO LO MIDDLEWARE
/*
Route::get('dirdoc', ['middleware' => 'Dirdoc', function () {
    return "asd";
}]);
*/
