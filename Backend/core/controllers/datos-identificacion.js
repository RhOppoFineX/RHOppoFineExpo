$(document).ready(function()
{
    showTable();
});

const apiColaborador = '../../RHOppoFineExpo/Backend/core/api/colaborador.php?action=read';
const apidatosIdentificacion = '../../RHOppoFineExpo/Backend/core/api/datos-identificacion.php?action=';
const apiEstadocivil = '../../RHOppoFineExpo/Backend/core/api/Estado-civil.php?action=read';

function fillTable(filas)
{
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para interpolar las varibles con el string
    let contenido = '';

   filas.forEach(fila => {
        //son comillas invertidas no simple ni dobles
        contenido+= `
            <tr>                
                <td>${fila.Num_documento}</td>							
                <td>${fila.Residencia}</td>
                <td>${fila.Lugar_expedicion}</td>							
                <td>${fila.Fecha_expedicion}</td>							
                <td>${fila.Profesion_oficio}</td>	
                <td>${fila.Estado}</td>						
                <td>${fila.Fecha_expiracion}</td>							
                <td>${fila.Num_ISSS}</td>							
                <td>${fila.AFP}</td>							
                <td>${fila.NUP}</td>							
                <td>${fila.Tipo_documento==1 ? 'DUI' : 'Carnet de residente'}</td>   
                <td>${fila.Colaborador}</td>             
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${fila.Id_datos})">Modificar</a></td>
                <td><a class="btn btn-primary btn-sm" onclick="confirmDelete('${apidatosIdentificacion}', ${fila.Id_datos}, null, 'disable')">Deshabilitar</a></td>				
            </tr>       
        `;//invertidas
        //Los nombres de Id_religion o Religion sin excatamente iguales a los campos de la base de datos en esa tabla
        //si su tabla tiene mas campos agregarlos aqui un <tr> es una fila acurdense y los <td> son las columnas de es fila

   });
   //id del tbody en la tabla correspondiente
   $('#tabla-datos-identificacion').html(contenido); 
      
}

//funcion para mostrar la tabla
function showTable()
{
    $.ajax({
        url: apidatosIdentificacion + 'read',
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
    $('#form-colaborador-add')[0].reset();//Id del formulario
    fillSelect(apiColaborador, 'Colaborador', null);//llenar el combo
    fillSelect(apiEstadocivil, 'Estado_civil', null);//llenar el combo
    //Tipos-A es el Id del combobox
    $('#modal-colaborador-add').modal('show');//Id del modal
}

// Función para crear un nuevo registro
$('#form-colaborador-add').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apidatosIdentificacion + 'create',
        type: 'post',
        data: new FormData($('#form-colaborador-add')[0]),
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
            console.log(response + 'No');
            if (result.status) {               
                $('#modal-colaborador-add').modal('hide');
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
        url: apidatosIdentificacion + 'get',
        type: 'post',
        data:{
            Id_Datos: id
        },
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiColaborador es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#Id_colaborador_up').val(result.dataset.Id_datos);
                $('#Telefono_casa_up').val(result.dataset.Telefono_casa);
                $('#Telefono_celular_up').val(result.dataset.Telefono_celular);
                $('#Correo_up').val(result.dataset.Correo_institucional);
                $('#Direccion_up').val(result.dataset.Direccion_residencial);
                fillSelect(apiEstadocivil, 'Religion_up', result.dataset.Id_estado_civil); 
                fillSelect(apiColaborador, 'Municipio_up', result.dataset.Id_Colaborador);       
                $('#NIP_up').val(result.dataset.NIP);
                $('#Nivel_up').val(result.dataset.Nivel);
                $('#Estudiando_up').val(result.dataset.Estudiando);              
                          
                $('#modal-colaborador-up-iden').modal('show');   
            } else {
                sweetAlert(2, result.exception, null);
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
$('#form-colaborador-up').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiColaborador + 'update',
        type: 'post',
        data: new FormData($('#form-colaborador-up')[0]),
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
                $('#modal-colaborador-up').modal('hide');
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

