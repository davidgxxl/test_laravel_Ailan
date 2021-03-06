<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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