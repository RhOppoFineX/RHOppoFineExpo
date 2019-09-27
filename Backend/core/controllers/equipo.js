$(document).ready(function()
{
    showTable();
})

// Constante para establecer la ruta y parámetros de comunicación con la apiUsuario
const apiEquipo = '../../RHOppoFineExpo/Backend/core/api/Equipo.php?action=';
const tablaPadre = '../../RHOppoFineExpo/Backend/core/api/Tipo-equipo.php?action=read';

// Función para llenar tabla con los datos de los registros
function fillTable(rows)
{
    let content = '';
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        content += `
            <tr>                
                <td>${row.Nombre_equipo}</td>            
                <td>${row.Tipo_equipo}</td>
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${row.Id_equipo})">Modificar<a><td>
				<td><a class="btn btn-danger btn-sm" onclick="confirmDelete('${apiEquipo}', ${row.Id_equipo}, null, 'delete')">Eliminar</a></td> 
            </tr>
        `;
    });
    $('#tbody-read').html(content);    
}

// Función para obtener y mostrar los registros disponibles
function showTable()
{
    $.ajax({
        url: apiEquipo + 'read',
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

    // Función para mostrar los resultados de una búsqueda
$('#form-search').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiEquipo + 'search',
        type: 'post',
        data: $('#form-search').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiUsuario es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                fillTable(result.dataset);
                sweetAlert(1, result.message, null);
            } else {
                sweetAlert(3, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })

    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

// Función para mostrar formulario insertar en blanco
function modalCreate()
{
    $('#agregarEquipo')[0].reset();//Id del formulario
    fillSelect(tablaPadre, 'Tipo-equipo-A', null);//llenar el combo
    //Tipos-A es el Id del combobox
    $('#equipoAgregar').modal('show');//Id del modal
}

// Función para crear un nuevo registro
$('#agregarEquipo').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiEquipo + 'create',
        type: 'post',
        data: new FormData($('#agregarEquipo')[0]),
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
                $('#equipoAgregar').modal('hide');
                showTable();
                sweetAlert(1, result.message, null);
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
})

// Función para mostrar formulario con registro a modificar
function actualizarModal(id)
{
    $.ajax({
        url: apiEquipo + 'get',
        type: 'post',
        data:{
            Id_equipo : id
        },
        datatype: 'json'
    })

    .done(function(response){
        // Se verifica si la respuesta de la apiUsuario es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#Id_equipo').val(result.dataset.Id_equipo);
                $('#Nombre-equipo').val(result.dataset.Nombre_equipo);
                fillSelect(tablaPadre, 'Tipo-equipo', result.dataset.Id_tipo_equipo);           
                $('#equipoModificar').modal('show');
                console.log();   
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
$('#modificarEquipo').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiEquipo + 'update',
        type: 'post',
        data: new FormData($('#modificarEquipo')[0]),
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
                $('#equipoModificar').modal('hide');
                showTable();
                sweetAlert(1, result.message, null);         
                
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
})