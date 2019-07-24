$(document).ready(function()
{
    showTable();
})

// Constante para establecer la ruta y parámetros de comunicación con la apiidioma
const apidepartamento = '../../RHOppoFineExpo/Backend/core/api/Departamento.php?action=';

const tablaPadre = '../../RHOppoFineExpo/Backend/core/api/nacionalidad.php?action=read';

// Función para llenar tabla con los datos de los registros
function fillTable(rows)
{
    let content = '';
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        content += `
            <tr>                
                <td>${row.Departamento}</td>
                <td>${row.Nacionalidad}</td>
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${row.Id_departamento})">Modificar</a></td>
				<td><a class="btn btn-danger btn-sm" onclick="confirmDelete('${apidepartamento}', ${row.Id_departamento}, null)">Deshabilitar</a></td> 
            </tr>
        `;
    });
    $('#tabla-departamento').html(content);       
}

// Función para obtener y mostrar los registros disponibles
function showTable()
{
    $.ajax({
        url: apidepartamento + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiidioma es una cadena JSON, sino se muestra el resultado en consola
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
        url: apidepartamento + 'search',
        type: 'post',
        data: $('#form-search').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiidioma es una cadena JSON, sino se muestra el resultado en consola
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
    $('#insertarDepartamento')[0].reset();//Id del formulario
    fillSelect(tablaPadre, 'Nacionalidad-A', null);//llenar el combo
    //Tipos-A es el Id del combobox
    $('#departamentoInsertar').modal('show');//Id del modal
}

// Función para crear un nuevo registro
$('#insertarDepartamento').submit(function() 
{
    event.preventDefault();
    $.ajax({
        url: apidepartamento + 'create',
        type: 'post',
        data: new FormData($('#insertarDepartamento')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiidioma es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {               
                $('#departamentoInsertar').modal('hide');
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
        url: apidepartamento + 'get',
        type: 'post',
        data:{
            Id_departamento: id
        },
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiidioma es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#Id_departamento').val(result.dataset.Id_departamento);
                $('#Departamento-B').val(result.dataset.Departamento);
                fillSelect(tablaPadre, 'Nacionalidad-B', result.dataset.Id_nacionalidad);           
                $('#departamentoModificar').modal('show');   
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
$('#modificarDepartamento').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apidepartamento + 'update',
        type: 'post',
        data: new FormData($('#modificarDepartamento')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiidioma es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#departamentoModificar').modal('hide');
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