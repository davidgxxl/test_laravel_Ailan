<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\User;

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
    // Agregar o modificar
    public function guardar(Request $rq){

        // Nuevo o actualizar
        if(!$pr = User::where("id",$rq->id)->first()){
            $pr = new User;
        }

        // Verificación de correo repetido
        if (User::where("email",$rq->email)->where("id","!=",$pr->id)->exists()) {
            return redirect()->back()->with('alerta',['tipo' => 'danger', 'mensaje' => 'El correo ingresado ya se encuentra en nuestra base de datos']);
        }

        // Campos básicos - datos fijos en la tabla
        foreach (Schema::getColumnListing("usuarios") as $campo) {
            if ($rq->exists($campo)) { $pr->$campo = $rq->$campo; }
        }

        // Foto de perfil
        if($rq->exists("foto_perfil") && $rq->foto_perfil != ""){
            $nombre = str_replace([" ","."],"",microtime()).$rq->foto_perfil->getClientOriginalName();
            $rq->foto_perfil->move(public_path("/imgs/fotos_perfil"),$nombre);
            $pr->foto_perfil = $nombre;
        }

        // Teléfonos
        $pr->telf = json_encode($rq->telf);

        // Contraseña
        if (isset($rq->password)) {
            $pr->password = bcrypt($rq->password);
        }
        $pr->save();

        // Respuesta
        if (Auth::check()) {
            return redirect()->back()->with('alerta',['tipo' => 'success', 'mensaje' => 'Datos guardados exitosamente']);
        }
        else {
            return $this->ingresar($rq);
        }
    }

    // Ingresar
    public function ingresar(Request $rq){
        if (Auth::attempt($rq->only('email','password'))){
            return redirect()->back()->with('alerta',['tipo' => 'success', 'mensaje' => 'Bienvenido']);
        }
        else {
            return redirect()->back()->with('alerta',['tipo' => 'danger', 'mensaje' => 'Datos invalidos, por favor intente de nuevo']);
        }
    }
}