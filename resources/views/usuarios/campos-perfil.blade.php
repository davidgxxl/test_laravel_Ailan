{{-- Contenido --}}
@if (in_array("id",$campos))
    <input type="hidden" name="id">
@endif

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
        <input type="text" name="nombre" class="form-control" minlength="3" maxlength="50" required>
    </div>
    <div>
        <label>Segundo apellido</label>
        <input type="text" name="apellido" class="form-control" minlength="3" maxlength="50" required>
    </div>
</div>

{{-- Correo --}}
<div class="fila-form">
    <div>
        <label>Correo</label>
        <input type="email" name="email" class="form-control" maxlength="50" oninput="validarCampoUnico(this)" required>
    </div>
</div>

{{-- Teléfono --}}
<div class="fila-form">    
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
    @if (in_array("cambiar_contraseñas",$campos))
        <label class="cursor-pointer"> <input type="checkbox" name="contraseñas" onchange='document.querySelector("#contraseñas").disabled = !document.querySelector("#contraseñas").disabled'> Cambiar clave </label>
    @endif
    <fieldset id="contraseñas" @if (in_array("cambiar_contraseñas",$campos)) disabled @endif>
        <div class="fila-form">
            <div>
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" minlength="8" maxlength="15" oninput="compararContraseñas(this)" required>
            </div>
            <div>
                <label>Repetir contraseña</label>
                <input type="password" name="password2" class="form-control" minlength="8" maxlength="15" oninput="compararContraseñas(this)" required>
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