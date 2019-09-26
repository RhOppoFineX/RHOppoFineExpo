// Constante para establecer la ruta y parámetros de comunicación con la API
const apiAccount = '../../RHOppoFineExpo/Backend/core/api/usuarios.php?action=';

// Función para cerrar la sesión del usuario
function signOff()
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere cerrar la sesión?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            location.href = apiAccount + 'logout';
        }
    });
}

function signOffIncative()
{    
    location.href = apiAccount + 'logout';    
}

// Función para mostrar formulario de perfil de usuario
function modalProfile()
{
    $.ajax({
        url: apiAccount + 'readProfile',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#Nombres-P').val(result.dataset.Nombres_usuario);
                $('#Apellidos-P').val(result.dataset.Apellidos_usuario);
                $('#Correo-P').val(result.dataset.Correo_usuario);
                $('#userName-P').val(result.dataset.Alias_usuario);                
                $('#perfil').modal('show');
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

// Función para editar el perfil del usuario que ha iniciado sesión
$('#perfil-update').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiAccount + 'editProfile',
        type: 'post',
        data: $('#perfil-update').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#perfil').modal('hide');
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

// Función para cambiar la contraseña del usuario que ha iniciado sesión
$('#pass-update').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiAccount + 'password',
        type: 'post',
        data: $('#pass-update').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#perfil-pass').modal('hide');
                
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

// Función para cambiar la contraseña del usuario si la ha olivdado
$('#reset-usuario').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiAccount + 'reset',
        type: 'post',
        data: $('#reset-usuario').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                sweetAlert(1, result.message, null);
                $('#modal-reset-password').modal('show');
                $('#Correo_token').val(result.dataset);
                //enviarCorreo(result.email);
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

// Función para Validar el Token
$('#form-reset-password').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiAccount + 'token',
        type: 'post',
        data: $('#form-reset-password').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                sweetAlert(1, result.message, null);
                $('#Correo_verificado').val(result.dataset.Correo_usuario);
                $('#modal-reset-password-token').modal('show');
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

// Función para Resetear contrseña después del Token
$('#form-reset-password-token').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiAccount + 'pass_token',
        type: 'post',
        data: $('#form-reset-password-token').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                sweetAlert(1, result.message, 'index.php');                
                $('#modal-reset-password-token').modal('hide');
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
