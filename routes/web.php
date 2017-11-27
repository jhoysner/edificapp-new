<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');


Route::group(['middleware' => 'auth'], function(){

    Route::get('dashboard', [
        'uses'  => 'UserController@dashboard',
        'as'    =>  'dashboard'
    ]);

    Route::get('cuenta', [
            'uses'  => 'UserController@editarCuenta',
            'as'    =>  'cuenta'
    ]);

    Route::post('editUser', 'UserController@editUser');

    Route::get('especialistas', [
            'uses'  => 'UserController@especialistas',
            'as'    =>  'especialistas'
    ]);

});


Route::group(['middleware' => ['auth', 'especialista']], function(){

////////////////////////////////////////////////////////////////
    Route::resource('especializaciones', 'EspecializacionesController');

    Route::get('especializaciones/actividades/{id}', 'EspecializacionesController@actividades');

    Route::get('contratos', [
            'uses'  => 'UserController@misContratos',
            'as'    =>  'contratos'
    ]);

    Route::get('calificaciones', [
            'uses'  => 'UserController@calificaciones',
            'as'    =>  'calificaciones'
    ]);


    Route::resource('proyectos', 'ProyectoController');

    Route::resource('proyectos/imagenes', 'ImagenController');

    Route::get('proyectos/imagenes/create/{id}', 'ImagenController@create');

    Route::post('subirimagenes', 'ImagenController@store');


    Route::get('membresia', [
            'uses'  => 'UserController@membresia',
            'as'    =>  'membresia'
    ]);
    // Route::get('buscarContratos', [
    //         'uses'  => 'usuarioController@buscarContratos',
    //         'as'    =>  'buscarContratos'
    // ]);

});

Route::get('cotizaciones', [
        'uses'  => 'UserController@cotizaciones',
        'as'    =>  'cotizaciones'
]);