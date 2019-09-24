$(document).ready(function()
{
    showTable();
});

const apiColaborador = '../../RHOppoFineExpo/Backend/core/api/colaborador.php?action=';
const apiMunicipio = '../../RHOppoFineExpo/Backend/core/api/Municipio.php?action=read';
const apiReligion = '../../RHOppoFineExpo/Backend/core/api/Religion.php?action=read';

function fillTable(filas)
{
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para interpolar las varibles con el string
    let contenido = '';

   filas.forEach(fila => {
        //son comillas invertidas no simple ni dobles
        contenido+= `
            <tr>                
                <td>${fila.Codigo_colaborador}</td>							
                <td>${fila.Nombres}</td>
                <td>${fila.Apellidos}</td>							
                <td>${fila.Genero}</td>							
                <td>${fila.Fecha_nacimiento}</td>							
                <td>${fila.Religion}</td>							
                <td>${fila.Municipio}</td>							
                <td>${fila.Telefono_casa}</td>							
                <td>${fila.Telefono_celular}</td>							
                <td>${fila.Correo_institucional}</td>
                <td>${fila.NIP}</td>                
                <td>${fila.Nivel}</td>                
                <td>${fila.Estudiando==1 ? 'Estudiante' : 'Trabajador'}</td>
                <td>${fila.Fecha_ingreso}</td>
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${fila.Id_Colaborador})">Modificar</a></td>
                <td><a class="btn btn-primary btn-sm" onclick="confirmDelete('${apiColaborador}', ${fila.Id_Colaborador}, null, 'disable')">Deshabilitar</a></td>				
            </tr>       
        `;//invertidas
        //Los nombres de Id_religion o Religion sin excatamente iguales a los campos de la base de datos en esa tabla
        //si su tabla tiene mas campos agregarlos aqui un <tr> es una fila acurdense y los <td> son las columnas de es fila

   });
   //id del tbody en la tabla correspondiente
   $('#tabla-colaborador').html(contenido); 
      
}

//funcion para mostrar la tabla
function showTable()
{
    $.ajax({
        url: apiColaborador + 'read',
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
    fillSelect(apiMunicipio, 'Municipio', null);//llenar el combo
    fillSelect(apiReligion, 'Religion', null);//llenar el combo
    //Tipos-A es el Id del combobox
    $('#modal-colaborador-add').modal('show');//Id del modal
}

// Función para crear un nuevo registro
$('#form-colaborador-add').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiColaborador + 'create',
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
        url: apiUsuario + 'get',
        type: 'post',
        data:{
            Id_colaborador: id
        },
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiUsuario es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#Id-colaborador-up').val(result.dataset.Id_colaborador);
                $('#Telefono_casa-up').val(result.dataset.Telefono_casa);
                $('#Telefono_celular-up').val(result.dataset.Telefono_celular);
                $('#Correo_institucional-up').val(result.dataset.Correo_institucional);
                $('#Direccion_residencial-up').val(result.dataset.Direccion_residencial);
                fillSelect(apiReligion, 'Religion-up', result.dataset.Id_religion); 
                fillSelect(tablaPadre, 'Municipio-up', result.dataset.Id_municipio);       
                $('#NIP-up').val(result.dataset.NIP);
                $('#Nivel-up').val(result.dataset.Nivel);
                $('#Estudiando-up').val(result.dataset.Estudiando);              
                          
                $('#modal-colaborador-up').modal('show');   
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
$('form-colaborador-up').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiColaborador + 'update',
        type: 'post',
        data: new FormData($('form-colaborador-up')[0]),
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

