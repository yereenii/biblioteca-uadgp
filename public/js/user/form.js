function cambioTipoDeUsuario(){
    let tipoUsuario = document.getElementById('tipo_usuario');

    if (parseInt(tipoUsuario.value) == 0) { // Alumno
        ocultarOtrasOpciones('formulario_de_alumnos');

    } else if(parseInt(tipoUsuario.value) == 1) { // Docente
        ocultarOtrasOpciones('formulario_de_docentes');

    } else if(parseInt(tipoUsuario.value) == 2){ // Investigador
        ocultarOtrasOpciones('formulario_de_investigador');

    }else{ // Se ocultan todos
        ocultarOtrasOpciones('ninguno');
        
    }
}

function ocultarOtrasOpciones(opcion){
    // hacer requeridos todos los campos
    let idsDeCampos = [
        'matricula','semestre','nivel_academico_id', // alumnos
        'materia_impartida_id', // docentes
        'procedencia' // investigador
    ];
    cambiarRequired(true, idsDeCampos);

    if(opcion != 'ninguno'){
        document.getElementById(opcion).style.display = 'block';
    }
    if(opcion != 'formulario_de_alumnos'){
        document.getElementById('formulario_de_alumnos').style.display = 'none';
        document.getElementById('nivel_academico_id').selectedIndex = '';
        // hacer los campos no requeridos 
        cambiarRequired(false, ['matricula','semestre','nivel_academico_id']);
    }
    if(opcion != 'formulario_de_docentes'){
        document.getElementById('formulario_de_docentes').style.display = 'none';
        // hacer los campos no requeridos 
        cambiarRequired(false, ['materia_impartida_id']);
    }
    if(opcion != 'formulario_de_investigador'){
        document.getElementById('formulario_de_investigador').style.display = 'none';
        document.getElementById('procedencia').selectedIndex = '';
        // hacer los campos no requeridos 
        cambiarRequired(false, ['procedencia']);
    }
    
}

function cambiarRequired(esRequerido, ids) {
    ids.forEach(element => {
        document.getElementById(element).required = esRequerido;
    });
}

// Se carga al ejecutar
$(document).ready(function(){
    cargarDatosAlEditar();
});

function cargarDatosAlEditar(){
    if(datosDeTipoDeUsuario != '' && rolDeUsuario != '' ){
        if (rolDeUsuario == 'alumno') {
            // selecionamos y mostramos card
            document.getElementById('tipo_usuario').value  = 0;
            cambioTipoDeUsuario();
            // Cargamos los datos
            document.getElementById('matricula').value = datosDeTipoDeUsuario['matricula'];
            document.getElementById('semestre').value = datosDeTipoDeUsuario['semestre'];
            document.getElementById('nivel_academico_id').value  = datosDeTipoDeUsuario['nivel_academico_id'];
            
            
        } else if(rolDeUsuario == 'docente') {
            // selecionamos y mostramos card
            document.getElementById('tipo_usuario').value  = 1;
            cambioTipoDeUsuario();
            // Cargamos los datos
            document.getElementById('materia_impartida_id').value  = datosDeTipoDeUsuario['materia_impartida_id'];
            
            
        }else if (rolDeUsuario == 'investigador') {
            // selecionamos y mostramos card
            document.getElementById('tipo_usuario').value  = 2;
            cambioTipoDeUsuario();
            // Cargamos los datos
            document.getElementById('procedencia').value  = datosDeTipoDeUsuario['procedencia'];
            
        }
    }
}
