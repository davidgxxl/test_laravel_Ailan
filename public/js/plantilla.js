// Solo numeros
function soloNumeros(tecla){ if ( tecla.keyCode < 47 || tecla.keyCode > 58){ tecla.returnValue = false; } }

// Administrador
// Activar todos los checks dentro de la tabla donde fue activado el check principal dentro de la clase "tb-resultados"
var checks = document.querySelectorAll('.tb-resultados input[name="resultado[]"]');
function clickTodos(){
    checks.forEach(check => { check.checked = checkPrincipal.checked; });
}
// Contar checks
function contarChecks(){

    // Activar/Desactivar el check principal
    var numChecksActivos = document.querySelectorAll('.tb-resultados input[name="resultado[]"]:checked').length;
    if(numChecksActivos == checks.length){ checkPrincipal.checked = true; }
    else { checkPrincipal.checked = false; }

    // Gestionar las opciones
    if(numChecksActivos > 0){ var estatus = false; }
    else { var estatus = true; }
    document.querySelectorAll('.btn-admin').forEach(btn => { btn.disabled = estatus; });
}

// Consulta de datos para la ventana modal de editar perfil
function consultar(id){
    $.ajax({
        data: '',
        url: '/perfiles/consultar/'+id,
        method: 'GET',
        cache: false,
        processData: false,
        contentType: false,
        success: function(data){
            var campos = ["id","email","nombre","apellido","telf1","telf2"];
            campos.forEach(campo => {
                document.querySelector('input[name="'+campo+'"]').value = data[campo];
            });
        }
    })
}

// Mover el slider de mas visitados y las clasificaciones en el inicio
// La  variable "valor" viene desde la vista
function rotar(i,direccion){
    var limite = document.querySelectorAll('.cont-carrusel')[i].clientWidth - document.querySelectorAll('.carrusel')[i].clientWidth;
    if(direccion == "siguiente"){
        valor[i] = valor[i] - 350;
        if(valor[i] <= limite){
            valor[i] = limite;
        }
    }
    else {
        valor[i] = valor[i] + 350;
        if(valor[i] >= 0){
            valor[i] = 0;
        }
    }
    document.querySelectorAll(".carrusel")[i].setAttribute('style','transform: translate('+valor[i]+'px,0px)');
}