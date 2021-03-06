<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArtistasCtrl extends Controller
{

    // Artitas
    public function artistas($filtros="page-1"){

        // Consulta
        $rs = Http::withHeaders([
            "x-happi-key"   =>  "a85f2d8DJV9zjAI8Q4rm9ho37kDDJtoCrWbOt6SzahyGuQeQYLiVNWEU"
        ])->get(
            "https://api.happi.dev/v1/music/"
            .
            str_replace(["page-","-"],["artists?page=","/"],$filtros)
        )->json();

        // Tipo de vista
        if (explode("-",$filtros)[0]=="page") {
            $vista=1;
        }
        else {
            $vista = count(explode("-",$filtros));
        }

        // Respuesta
        return view("artistas",compact("vista","rs"));
    }
}