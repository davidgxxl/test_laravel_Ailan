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

// Artistas
Route::get("/artistas/{filtros?}","ArtistasCtrl@artistas")->name("artistas");
// Route::get("/artistas/{filtos?}","ArtistasCtrl@artistas")->name("filtros-artistas");

// Rutas protegidas
Route::group(['middleware' => 'auth'],function(){

    // Perfil
    Route::prefix($prefijo='perfil')->name($prefijo)->group(function(){
        Route::get('/',function (){
            $usuario = Auth::user();
            return view("usuarios.usuario",compact("usuario"));
        })->name('');
        Route::post("/guardar-perfil","UsuariosCtrl@guardar")->name("-guardar");
    });

    // Cerrar sesion
    Route::get('/salir',function(){
        Auth::logout();
        return redirect()->route("inicio");
    })->name("salir");
});