{{-- Plantilla --}}
@extends('plantilla.plantilla')

{{-- Metadatos --}}
@php
    $tituloMD = ucfirst(Route::currentRouteName());
@endphp

{{-- Estilos --}}
@section('estilos')
    <link rel="stylesheet" href="{{asset("css/formularios.css")}}">
    <style>
        .form-sesion {
            max-width: 500px;
            margin: 0px auto;
        }
    </style>
@append

{{-- Contenido --}}
@section('contenido')

    {{-- Formulario --}}
    <form action="/{{Route::currentRouteName()}}" method="POST" class="form-sesion" enctype="multipart/form-data">
        @csrf

        {{-- Titulo --}}
        <h3>{{ucfirst(str_replace("-"," ",Route::currentRouteName()))}}</h3>

        @switch(Route::currentRouteName())

            {{-- Registro --}}
            @case("registro")
                @include('usuarios.campos-perfil',$campos=["contraseñas"])
            @break

            {{-- Iniciar sesion --}}
            @case('ingreso')
                <div class="fila-form">
                    <div>
                        <label>Correo</label>
                        <input type="email" class="form-control" name="email" autofocus required>
                    </div>
                </div>
                <div class="fila-form">
                    <div>
                        <label>Contraseña</label>
                        <input type="password" class="form-control" name="password" minlength="8" maxlength="15" required>
                    </div>
                </div>
                <a href="" data-toggle="modal" data-target="#vtnRecuperarContraseña">¿Recuperar contraseña?</a>
            @break
        @endswitch

        {{-- Botones --}}
        <div class="btns-form">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection