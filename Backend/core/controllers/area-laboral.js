$(document).ready(function()
{
    showTable();
    happyBirthday();
    blockingTime();
})

// Constante para establecer la ruta y parámetros de comunicación con la apiidioma
const api = '../../RHOppoFineExpo/Backend/core/api/area-laboral.php?action=';

// Función para llenar tabla con los datos de los registros
function fillTable(rows)
{
    let content = '';
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        content += `
            <tr>                
                <td>${row.Id_area}</td>
                <td>${row.Id_puesto}</td>
                <td>${row.Sueldo_plaza}</td>
                <td>${row.Fecha_ingreso}</td>
                <td>${row.Inicio_contrato}</td>
                <td>${row.Fin_contrato}</td>
                <td>${row.Horas_al_dia}</td>
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${row.Id_laboral})">Modificar</a></td>
                <td><a class="btn btn-primary btn-sm" onclick="confirmDelete('${api}', ${row.Id_laboral}, null, 'disable')">Deshabilitar</a></td> 
                <td><a class="btn btn-danger btn-sm" onclick="confirmDelete('${api}', ${row.Id_laboral}, null, 'delete')">Eliminar</a></td> 
            </tr>
        `;
    });
    $('#tabla-laboral').html(content);       
}

// Función para obtener y mostrar los registros disponibles
function showTable()
{
    $.ajax({
        url: api + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiUsuario es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (!result.status) {
                sweetAlert(4, result.exception, null);
            }
            fillTable(result.dataset);
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
    $('#agregarUsuario')[0].reset();//Id del formulario
    $('#usuarioAgregar').modal('show');//Id del modal
}

// Función para crear un nuevo registro
$('#agregarUsuario').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'create',
        type: 'post',
        data: new FormData($('#agregarUsuario')[0]),
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
                $('#usuarioAgregar').modal('hide');
                showTable();
                sweetAlert(1, result.message, null);
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            sweetAlert(2, response, null);
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
        url: apiUsuario + 'get',
        type: 'post',
        data:{
            Id_usuario: id
        },
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiUsuario es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#Id_usuario').val(result.dataset.Id_usuario);
                $('#Nombres').val(result.dataset.Nombres_usuario);
                $('#Apellidos').val(result.dataset.Apellidos_usuario);
                $('#Correo').val(result.dataset.Correo_usuario);
                $('#userName').val(result.dataset.Alias_usuario);
                fillSelect(tablaPadre, 'Tipos', result.dataset.Id_tipo_usuario);           
                $('#usuarioModificar').modal('show');   
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

// Función para modificar un registro seleccionado previamente
//Id del formulario
$('#modificarUsuario').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiUsuario + 'update',
        type: 'post',
        data: new FormData($('#modificarUsuario')[0]),
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
                $('#usuarioModificar').modal('hide');
                showTable();
                sweetAlert(1, result.message, null);         
                
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            sweetAlert(2, response, null);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
