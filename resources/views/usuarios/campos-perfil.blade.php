{{-- Estilos --}}
@section('estilos')
    <style>
        /* Foto de perfil */
        .cont-img {
            position: relative;
            margin: 0px auto 50px;
            width: 250px;
            height: 250px;
            border: solid var(--c-plantilla) 2px;
        }
        .cont-img:hover label { visibility: visible; }
        .cont-img label {
            position: absolute;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            visibility: hidden;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background: var(--t-c-plantilla);
            color: var(--c-letra-t-c-plantilla);
            cursor: pointer;
            font-size: 25px;
        }
        .cont-img img { width: 100%; height: 100%; object-fit: contain; }

    </style>
@append

{{-- Contenido --}}
@if (in_array("id",$campos))
    <input type="hidden" name="id">
@endif

{{-- Foto --}}
<div class="cont-img">
    <img id="vpImg"
        @if (($validacion = isset($usuario) && $usuario->foto_perfil))
            src="{{asset("imgs/fotos_perfil/$usuario->foto_perfil")}}"
        @else
            src="/imgs/plantilla/perfil.jpg"
        @endif
    alt="{{ ($validacion) ? $usuario->nombre_1." ".$usuario->apellido_1 : "Foto de perfil" }}">
    <label>
        <input type="file" name="foto_perfil" class="d-none" onchange='vpImg.src = (window.URL || window.webkitURL).createObjectURL(this.files[0])' accept="image/jpeg,image/jpg,image/png">
        Cambiar imagen
    </label>
</div>

{{-- Nombres --}}
<div class="fila-form">
    <div>
        <label>Primer nombre</label>
        <input type="text" name="nombre_1" class="form-control" minlength="3" maxlength="50" required>
    </div>
    <div>
        <label>Segundo nombre</label>
        <input type="text" name="nombre_2" class="form-control" minlength="3" maxlength="50" required>
    </div>
</div>

{{-- Apellidos --}}
<div class="fila-form">
    <div>
        <label>Primer apellido</label>
        <input type="text" name="apellido_1" class="form-control" minlength="3" maxlength="50" required>
    </div>
    <div>
        <label>Segundo apellido</label>
        <input type="text" name="apellido_2" class="form-control" minlength="3" maxlength="50" required>
    </div>
</div>

{{-- Correo --}}
<div class="fila-form">
    <div>
        <label>Correo</label>
        <input type="email" name="email" class="form-control" maxlength="50" required>
    </div>
</div>

{{-- Fecha de nacimiento y teléfono --}}
<div class="fila-form">
    <div>
        <label>Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" max="{{date("Y-m-d")}}" required>
    </div>
    <div>
        <label>Teléfono</label>
        <div class="fila-form">
            <input name="telf[codigo_pais]" class="form-control w-25" placeholder="58" minlength="2" maxlength="4" onkeypress="soloNumeros(event)" required>
            <input name="telf[telf]" class="form-control" placeholder="1234567890" minlength="7" maxlength="12" onkeypress="soloNumeros(event)" required>
        </div>
    </div>
</div>

{{-- Contraseñas --}}
@if (in_array("contraseñas",$campos))
    @if (in_array("cambiar-contraseña",$campos))
        <label class="cursor-pointer"> <input type="checkbox" name="contraseñas" onchange='document.querySelector("#contraseñas").disabled = !document.querySelector("#contraseñas").disabled'> Cambiar clave </label>
    @endif
    <fieldset id="contraseñas" @if (in_array("cambiar-contraseña",$campos)) disabled @endif>
        <div class="fila-form">
            <div>
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" minlength="8" maxlength="15" required>
            </div>
            <div>
                <label>Repetir contraseña</label>
                <input type="password" name="password2" class="form-control" minlength="8" maxlength="15" required>
            </div>
        </div>
    </fieldset>
@endif

{{-- JavaScript --}}
@section('js')
    <script>
        // Solo numeros
        function soloNumeros(tecla){
            if ( tecla.keyCode < 47 || tecla.keyCode > 58){
                tecla.returnValue = false;
            }
        }
    </script>
@append

{{-- Editar --}}
@isset($usuario)
    <script>
        var datos = {!! json_encode($usuario) !!};
        Object.keys(datos).forEach(function(clave) {
            if (clave!="foto_perfil") {
                if (campo = document.querySelector('[name="'+clave+'"]')) {
                    campo.value = datos[clave];
                }
            }
        });

        // Teléfono        
        Object.keys(datos = JSON.parse(datos.telf)).forEach(function(clave) {
            if (campo = document.querySelector('[name="telf['+clave+']"]')) {
                campo.value = datos[clave];
            }
        });
    </script>
@endisset