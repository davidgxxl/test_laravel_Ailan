<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
<head>

    {{-- Matadatos --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{csrf_token()}}">
    @yield('metadatos')
    {{-- HTML --}}
    <title>{{(isset($tituloMD)) ? $tituloMD : $tituloMD=""}}</title>
    <meta name="description" content="{{(isset($descripcionMD)) ? $descripcionMD : $descripcionMD=""}}">
    {{-- Motores de busqueda de Google --}}
    <meta itemprop="name" content="{{$tituloMD}}">
    <meta itemprop="description" content="{{$descripcionMD}}">
    <meta itemprop="image" content="{{ (isset($imgMD)) ? $imgMD : $imgMD = "/imgs/plantilla/logotipo-metadatos.png"}}">
    {{-- Facebook --}}
    <meta property="og:url" content="{{config("app.url")}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$tituloMD}}">
    <meta property="og:description" content="{{$descripcionMD}}">
    <meta property="og:image" content="{{$imgMD}}">
    {{-- Twitter --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{$tituloMD}}">
    <meta name="twitter:description" content="{{$descripcionMD}}">
    <meta name="twitter:image" content="{{$imgMD}}">

    {{-- Imágen de pestaña --}}
    <link rel="shortcut icon" href="/imgs/plantilla/logotipo.png">

    {{-- Iconos --}}
    {{-- <link href="/iconos/css/all.min.css" rel="stylesheet"> --}}

    {{-- Estilos --}}
    <link href="/css/normalize.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/plantilla.css" rel="stylesheet">
    @yield('estilos')

    {{-- jQuery --}}
    <script src="/js/jquery.js"></script>

    {{-- JavaScript --}}
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>

    {{-- Cuerpo --}}
    <div class="d-flex flex-column min-vh-100">

        {{-- Menú --}}
        <div class="menu">
    
            {{-- Contenedor --}}
            <div class="container d-flex align-items-center justify-content-between">
    
                {{-- Izquierda --}}
                <div class="d-flex align-items-center">
                    <img class="logotipo-menu" src="{{asset("/imgs/plantilla/logotipo.png")}}" alt="{{config("app.name")}}">
                    <h5>{{config("app.name")}}</h5>
                </div>
        
                {{-- Centro --}}
                <div>
                    <a href="{{route("artistas")}}">Artistas</a>
                </div>

                {{-- Derecha --}}
                @auth
                    <div>
                        <a href="{{route("salir")}}">Cerrar sesión</a>
                    </div>
                @else
                    <div>
                        <a href="{{route("ingreso")}}">Ingreso</a>
                        <a href="{{route("registro")}}">Regitro</a>
                    </div>
                @endauth
            </div>
        </div>

        {{-- Contenido --}}
        <div class="container h-100 w-100 my-5">
            @yield('contenido')
        </div>
    </div>

    {{-- Pie de pagina --}}
    <div class="pie-pagina">
        <div class="container">
            Pie de pagina
        </div>
    </div>

    {{-- Javascript --}}
    <script src="/js/plantilla.js"></script>
    @yield('js')
</body>
</html>