{{-- Plantilla --}}
@extends('plantilla.plantilla')

{{-- Metadatos --}}
@php
    switch ($vista) {
        case 1: $tituloMD = "Artistas"; break;
        case 2: $tituloMD = $rs["result"]["artist"]; break;
    }
@endphp

{{-- Estilos --}}
@section('estilos')
    <style>
        /* Tabla de resultados */
        .tb-resultados {
            width: 100%;
            text-align: center;
        }
        .tb-resultados tr:nth-child(odd){ background: rgba(0,0,0,0.1); }
        .tb-resultados tr:first-of-type th {
            padding: 10px 12.5px;
            background: var(--c-plantilla);
            color: var(--c-letra-plantilla);
        }
        .tb-resultados td { padding: 5px ; }
        .tb-resultados tr th:first-of-type { width: 10px; }

        .img-artista {
            width: 75px;
        }
    </style>
@endsection

{{-- Contenido --}}
@section('contenido')

    {{-- Tipos de vistas --}}
    @switch($vista)

        {{-- Artistas --}}
        @case(1)

            {{-- Paginación --}}
            <div class="d-flex align-items-center justify-content-between">
                @foreach (["previous"=>"Anterior","next"=>"Siguiente"] as $d => $p)
                    <div>
                        @if ($e=$rs[$d])
                            <a href="{{route("artistas",str_replace("=","-",explode("?",$e)[1]))}}">{{$p}}</a>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Resultados --}}
            <table class="tb-resultados">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Artista</th>
                    {{-- <th>Albunes</th> --}}
                </tr>
                @foreach ($rs["result"] as $a)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td><img src="{{$a["cover"]}}" alt="{{$a["artist"]}}" class="img-artista"></td>
                        <td><a href="{{route("artistas","artists-".$a["id_artist"] )}}">{{$a["artist"]}}</a></td>
                        {{-- <td><a href="">Ver discografia</a></td> --}}
                    </tr>
                @endforeach
            </table>

            {{-- Paginación --}}
            <div class="d-flex align-items-center justify-content-between">
                @foreach (["previous"=>"Anterior","next"=>"Siguiente"] as $d => $p)
                    <div>
                        @if ($e=$rs[$d])
                            <a href="{{route("artistas",str_replace("=","-",explode("?",$e)[1]))}}">{{$p}}</a>
                        @endif
                    </div>
                @endforeach
            </div>
        @break

        {{-- Artista --}}
        @case(2)
            @php
                $rs = $rs["result"]
            @endphp
            <div class="d-flex">
                <img src="{{$rs["cover"]}}" alt="{{$rs["artist"]}}">
                <table class="ml-3">
                    <tr>
                        <td>
                            <h2>{{$rs["artist"]}}</h2>
                        </td>
                    </tr>
                    @php
                        $campos = [
                            "gender"    =>  "Género",
                            "country"   =>  "Pais",
                            "youtube"   =>  "YouTube",
                            "instagram" =>  "Instagram",
                            "twitter"   =>  "Twitter",
                            "facebook"  =>  "Facebook",
                            "website"   =>  "SitioWeb",
                            "spotify"   =>  "Spotify",
                        ];
                    @endphp
                    @foreach (array_keys($rs) as $campo)
                        @if (isset($campos[$campo]) && $valor = $rs[$campo])
                            <tr>
                                <td>
                                    <b>{{$campos[$campo]}}: </b> {{$valor}} <br>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    {{-- <tr>
                        <td>
                            <a href="{{route("artistas","artists-".$rs["id_artist"]."-albums")}}">Ver discografia</a>
                        </td>
                    </tr> --}}
                </table>
            </div>
        @break
    @endswitch
@endsection