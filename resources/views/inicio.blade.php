{{-- Plantilla --}}
@extends('plantilla.plantilla')

{{-- Metadatos --}}
@php
    $tituloMD = config("app.name");
@endphp

{{-- Estilos --}}
@section('estilos')
    <style>

    </style>
@endsection

{{-- Contenido --}}
@section('contenido')
    <div class="d-flex align-items-center justify-content-center h-100">
        <h1>Bienvenidos a {{config("app.name")}}</h1>
    </div>
@endsection