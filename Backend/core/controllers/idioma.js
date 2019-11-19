$(document).ready(function()
{
    showTable();
    happyBirthday();
    blockingTime();
})

// Constante para establecer la ruta y parámetros de comunicación con la apiidioma
const apiidioma = '../../RHOppoFineExpo/Backend/core/api/idioma.php?action=';

const tablaPadre = '../../RHOppoFineExpo/Backend/core/api/nivel-idioma.php?action=read';

// Función para llenar tabla con los datos de los registros
function fillTable(rows)
{
    let content = '';
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        content += `
            <tr>                
                <td>${row.Idioma}</td>
                <td>${row.Nivel}</td>
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${row.Id_idioma})">Modificar</a></td>
				<td><a class="btn btn-danger btn-sm" onclick="confirmDelete('${apiidioma}', ${row.Id_idioma}, null, 'delete')">Eliminar</a></td> 
            </tr>
        `;
    });
    $('#tabla-idioma').html(content);       
}

// Función para obtener y mostrar los registros disponibles
function showTable()
{
    $.ajax({
        url: apiidioma + 'read',
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
        url: apiidioma + 'search',
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
    $('#agregaridioma')[0].reset();//Id del formulario
    fillSelect(tablaPadre, 'Nivel-A', null);//llenar el combo
    //Tipos-A es el Id del combobox
    $('#idiomaAgregar').modal('show');//Id del modal
}

// Función para crear un nuevo registro
$('#agregaridioma').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiidioma + 'create',
        type: 'post',
        data: new FormData($('#agregaridioma')[0]),
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
                $('#idiomaAgregar').modal('hide');
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
        url: apiidioma + 'get',
        type: 'post',
        data:{
            Id_idioma: id
        },
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiidioma es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#Id_idioma').val(result.dataset.Id_idioma);
                $('#idioma').val(result.dataset.Idioma);
                fillSelect(tablaPadre, 'nivel', result.dataset.Id_nivel_idioma);           
                $('#idiomaModificar').modal('show');   
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
$('#modificaridioma').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiidioma + 'update',
        type: 'post',
        data: new FormData($('#modificaridioma')[0]),
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
                $('#idiomaModificar').modal('hide');
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
