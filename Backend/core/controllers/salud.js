$(document).ready(function()
{
    showTable();
    happyBirthday();
});

const apiColaborador = '../../RHOppoFineExpo/Backend/core/api/colaborador.php?action=read';
const apidatosSalud = '../../RHOppoFineExpo/Backend/core/api/datos-salud.php?action=';


function fillTable(filas)
{
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para interpolar las varibles con el string
    let contenido = '';

   filas.forEach(fila => {
        //son comillas invertidas no simple ni dobles
        contenido+= `
            <tr>                
                <td>${fila.Enfermedades_Tratamiento==1 ? 'SI' : 'NO'}</td>							
                <td>${fila.Medicamentos==1 ? 'SI' : 'NO'}</td>
                <td>${fila.Alergias==1 ? 'SI' : 'NO'}</td>							
                <td>${fila.Alergias_medicamentos==1 ? 'SI' : 'NO'}</td>   
                <td>${fila.Codigo_colaborador}</td>
                <td>${fila.Nombres}</td>                     
                <td>${fila.Apellidos}</td>
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${fila.Id_Salud})">Modificar</a></td>
                <td><a class="btn btn-primary btn-sm" onclick="confirmDelete('${apidatosSalud}', ${fila.Id_Salud}, null, 'disable')">Deshabilitar</a></td>				
            </tr>       
        `;//invertidas
        //Los nombres de Id_religion o Religion sin excatamente iguales a los campos de la base de datos en esa tabla
        //si su tabla tiene mas campos agregarlos aqui un <tr> es una fila acurdense y los <td> son las columnas de es fila

   });
   //id del tbody en la tabla correspondiente
   $('#tabla-datos-salud').html(contenido); 
      
}

//funcion para mostrar la tabla
function showTable()
{
    $.ajax({
        url: apidatosSalud + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })

    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if(isJSONString(response)){
            const resultado = JSON.parse(response);
             // Se comprueba si el resultado ha fallado si es asi se mostrara una IOException ksk
            if(!resultado.status)
            {
                sweetAlert(4, resultado.exception, null);
                console.log(response);
            }                
            fillTable(resultado.dataset);
            //dataset es el resultado de la consulta que devuelve la API
            //Este resultado es un array con los datos  

        } else {
            console.log(response);
        }

    })

    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });

}

// Función para mostrar formulario insertar en blanco
function modalCreate()
{
    $('#form-salud-add')[0].reset();//Id del formulario    
    fillSelect(apiColaborador, 'Colaborador', null);//llenar el combo
    //Tipos-A es el Id del combobox
    $('#modal-salud-add').modal('show');//Id del modal
}

// Función para crear un nuevo registro
$('#form-salud-add').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apidatosSalud + 'create',
        type: 'post',
        data: new FormData($('#form-salud-add')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiUsuario es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {               
                $('#modal-salud-add').modal('hide');
                showTable();
                sweetAlert(1, result.message, null);
            } else {                
                sweetAlert(2, isHtmlString(result.exception), null); 
            }
        } else {            
            sweetAlert(2, isHtmlString(response), null);            
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

// Función para mostrar formulario con registro a modificar
function actualizarModal(id)
{
    $.ajax({
        url: apidatosSalud + 'get',
        type: 'post',
        data:{
            Id_Salud: id
        },
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apidatosSalud es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#Id_salud').val(result.dataset.Id_Salud);
                $('#Enfermedad-Tratamiento-up').val(result.dataset.Enfermedades_Tratamiento);
                $('#Descripcion-Enfermedad-up').val(result.dataset.Descripcion_enfermedades);
                $('#Medicamentos-up').val(result.dataset.Medicamentos);
                $('#Descripcion-Medicamentos-up').val(result.dataset.Descripcion_medicamentos);
                $('#Alergias-up').val(result.dataset.Alergias);
                $('#Descripcion-Alergias-up').val(result.dataset.Descripcion_alergias);
                $('#Alergias-Medicamentos-up').val(result.dataset.Alergias_medicamentos);
                $('#Descripcion-Alergias-Medicamentos-up').val(result.dataset.Descripcion_alergias_medicamentos);                

                $('#modal-salud-up').modal('show');   
            } else {
                sweetAlert(2, isHtmlString(result.exception), null);
            }
        } else {
            sweetAlert(2, isHtmlString(response), null);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

// Función para crear un nuevo registro
$('#form-salud-up').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apidatosSalud + 'update',
        type: 'post',
        data: new FormData($('#form-salud-up')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiUsuario es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {               
                $('#modal-salud-up').modal('hide');
                showTable();
                sweetAlert(1, result.message, null);
            } else {                
                sweetAlert(2, isHtmlString(result.exception), null); 
            }
        } else {            
            sweetAlert(2, isHtmlString(response), null);            
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
