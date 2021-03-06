$(document).ready(function()
{
    showTable();
    happyBirthday();
    blockingTime();
});

const apiParentesco = '../../RHOppoFineExpo/Backend/core/api/Parentesco.php?action=read';
const apiColaborador = '../../RHOppoFineExpo/Backend/core/api/colaborador.php?action=read';
const apidatosFamiliares = '../../RHOppoFineExpo/Backend/core/api/datos-familiares.php?action=';


function fillTable(filas)
{
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para interpolar las varibles con el string
    let contenido = '';

   filas.forEach(fila => {
        //son comillas invertidas no simple ni dobles
        contenido+= `
            <tr>                
                <td>${fila.Nombres}</td>							
                <td>${fila.Apellidos}</td>
                <td>${fila.Fecha_nacimiento}</td>							
                <td>${fila.Dependiente==0 ? 'Independiente' : 'Dependiente'}</td>							
                <td>${fila.Parentesco}</td>	
                <td>${fila.colaborador}</td>						
                <td>${fila.Genero=='M' ? 'Masculino' : 'Femenino'}</td>							
                <td>${fila.Numero_telefono}</td>							    						         
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${fila.Id_datos_familiares})">Modificar</a></td>
                <td><a class="btn btn-primary btn-sm" onclick="confirmDelete('${apidatosFamiliares}', ${fila.Id_datos_familiares}, null, 'disable')">Deshabilitar</a></td>				
            </tr>       
        `;//invertidas
        //Los nombres de Id_religion o Religion sin excatamente iguales a los campos de la base de datos en esa tabla
        //si su tabla tiene mas campos agregarlos aqui un <tr> es una fila acurdense y los <td> son las columnas de es fila

   });
   //id del tbody en la tabla correspondiente
   $('#tabla-datosFamiliares').html(contenido); 
      
}

//funcion para mostrar la tabla
function showTable()
{
    $.ajax({
        url: apidatosFamiliares + 'read',
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
    $('#form-familiares-add')[0].reset();//Id del formulario
    fillSelect(apiParentesco, 'Parentesco', null);//llenar el combo
    fillSelect(apiColaborador, 'Colaborador', null);//llenar el combo
    //Tipos-A es el Id del combobox
    $('#modal-familiares-add').modal('show');//Id del modal
}

// Función para crear un nuevo registro
$('#form-familiares-add').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apidatosFamiliares + 'create',
        type: 'post',
        data: new FormData($('#form-familiares-add')[0]),
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
                $('#modal-familiares-add').modal('hide');
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
        url: apidatosFamiliares + 'get',
        type: 'post',
        data:{
            Id_datos_familiares: id
        },
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apidatosFamiliares es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#Dependiente-up').val(result.dataset.Dependiente);
                $('#Telefono-up').val(result.dataset.Numero_telefono);
                $('#Id-familiar-up').val(result.dataset.Id_datos_familiares);

                $('#modal-familiares-up').modal('show');   
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
$('#form-familiares-up').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apidatosFamiliares + 'update',
        type: 'post',
        data: new FormData($('#form-familiares-up')[0]),
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
                $('#modal-familiares-up').modal('hide');
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

