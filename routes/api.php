<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('login', 'PassportController@login');

Route::group(['middleware' => ['auth:api','role:Administrator']], function () {

    // tareas
    Route::get('tareas', 'TareasController@index');
    Route::post('tareas', 'TareasController@create');
    Route::put('tareas/{id}', 'TareasController@edit');
    Route::delete('tareas/{id}', 'TareasController@delete');

    // areas
    Route::get('areas', 'AreasController@index');
    Route::post('areas', 'AreasController@create');
    Route::put('areas/{id}', 'AreasController@edit');
    Route::delete('areas/{id}', 'AreasController@delete');

    // encargados
    Route::get('encargados', 'EncargadosController@index');
    Route::post('encargados', 'EncargadosController@create');
    Route::put('encargados/{id}', 'EncargadosController@edit');
    Route::delete('encargados/{id}', 'EncargadosController@delete');

    // Horario
    Route::get('horario', 'HorarioController@index');
    Route::post('horario', 'HorarioController@create');
    Route::put('horario/{id}', 'HorarioController@edit');
    Route::delete('horario/{id}', 'HorarioController@delete');

    // Users
    Route::get('user', 'UserController@index');
    Route::post('user', 'UserController@create');
    Route::put('user/{id}', 'UserController@edit');
    Route::put('userpassword/{id}', 'UserController@changePassword');
    Route::delete('user/{id}', 'UserController@delete');
});
