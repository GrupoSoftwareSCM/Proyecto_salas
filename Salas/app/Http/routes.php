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

/*
Route::controllers([
    'auth' => 'Auth\AuthController',
    //'password' => 'Auth\PasswordController',
]);
*/

Route::controller('auth', 'Auth\AuthController', [
    'getLogin'  => 'auth.login',
    'postLogin' => 'auth.doLogin',
    'getLogout' => 'auth.logout'
]);


Route::get('/home', ['as' => 'home', 'middleware' => ['auth', 'redir'], function(){
    return 'home';
}]);

Route::group(['before' => 'is_admin','prefix' =>  'Admin', 'namespace' => 'Administrador'], function(){
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

Route::group(['middleware' => 'encar','prefix' =>  'encar', 'namespace' => 'Encargado'], function(){
    Route::resource('asig/modi','asigController');
    Route::resource('estu/modi','estuController');
    Route::resource('curs/modi','cursController');
    Route::resource('salas/modi','SalasController');
    Route::resource('home','EncarUserController');
    Route::resource('asignar/modi','AsignarSalasController');

    });


Route::resource('users/encargados', 'Encargado\EncarUserController');

//PROBANDO LO MIDDLEWARE

/*Route::get('dirdoc', ['middleware' => 'encar', function () {
    return "asd";
}]);*/

//PROBANDO LOS FILTERS

Route::filter('is_admin',function(){

    $user = Auth::user();
    dd($user);
});