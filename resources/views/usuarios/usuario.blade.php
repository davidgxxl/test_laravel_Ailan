{{-- Plantilla --}}
@extends('plantilla.plantilla')

{{-- Metadatos --}}
@php
    $tituloMD = "$usuario->nombre_1 $usuario->apellido_1";
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
    <form action="{{route("perfil-guardar")}}" method="POST" class="form-sesion" enctype="multipart/form-data">

        {{-- Token --}}
        @csrf

        {{-- Campos --}}
        @include('usuarios.campos-perfil',$campos=["id","cambiar-contraseña","contraseñas"])
        
        {{-- Botones --}}
        <div class="btns-form">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
@endsection