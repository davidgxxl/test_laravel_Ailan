<?php

use Illuminate\Support\Facades\Route;

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

// Inicio
Route::view('/','inicio')->name("inicio");

// Sesion
// Registro
Route::get('/registro','UsuariosCtrl@sesion')->name('registro');
Route::post('/registro','UsuariosCtrl@guardar');
// Ingreso
Route::get('/ingreso','UsuariosCtrl@sesion')->name('ingreso');
Route::post('/ingreso','UsuariosCtrl@ingresar');