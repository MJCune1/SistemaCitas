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

Route::get('/home', 'HomeController@index');
Route::resource('/usuarios', 'UsersController');
Route::get('/medicos', 'UsersController@medicos');
Route::resource('/citas', 'CitasController');
Route::resource('/recipes', 'RecipesController');
Route::get('/citaspormedico', 'CitasController@citaspormedico');
Route::get('/citas/{id}/citamedico', 'CitasController@mostrarcitas');
Route::resource('/historias', 'HistoriasController');
Route::get('/miscitas', 'CitasController@miscitas');



Auth::routes();

Route::get('/home', 'HomeController@index');
