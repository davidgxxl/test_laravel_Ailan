<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosCtrl extends Controller
{

    // Sesion
    public function sesion(){
        if(Auth::check()){
            return redirect()->route('perfil');
        }
        else {
            return view('usuarios.sesion');
        }
    }

    // Guardar
}