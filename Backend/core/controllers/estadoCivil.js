$(document).ready(function()
{
    showTable();//al instante para cargar la tabla con la información
});

// Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../../RHOppoFineExpo/Backend/core/api/Estado-civil.php?action=';

function fillTable(filas)
{
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para interpolar las varibles con el string
    let contenido = '';

   filas.forEach(fila => {
        //son comillas invertidas no simple ni dobles
        contenido+= `
            <tr>
                <td>${fila.Id_estado_civil}</td>
                <td>${fila.Estado_civil}</td>							
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${fila.Id_estado_civil})">Modificar</a></td>
				<td><a class="btn btn-danger btn-sm" onclick="confirmDelete('${api}', ${fila.Id_estado_civil}, null)">Deshabilitar</a></td>
            </tr>       
        `;//invertidas
        //Los nombres de Id_religion o Religion sin excatamente iguales a los campos de la base de datos en esa tabla
        //si su tabla tiene mas campos agregarlos aqui un <tr> es una fila acurdense y los <td> son las columnas de es fila

   });
   //id del tbody en la tabla correspondiente
   $('#tabla-estado').html(contenido); 
      
}
//funcion para mostrar la tabla
function showTable()
{
    $.ajax({
        url: api + 'read',
        type: 'post',
        data: null,
        datatype: 'json'            
    })

    .done(function(reponse){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if(isJSONString(reponse)){
            const resultado = JSON.parse(reponse);
             // Se comprueba si el resultado ha fallado si es asi se mostrara una IOException ksk
            if(!resultado.status)
            {
                sweetAlert(4, resultado.exception, null);
                console.log(response);
            }                
            fillTable(resultado.dataset);
            //dataset es el resultado de la consulta que devuelve la API
            //Este resultado es un array con los datos  

        }else{
            console.log(reponse);
        }
    })

    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

// Función para mostrar formulario en blanco
function modalCreate()
{
    $('#estadoCivil-insertar')[0].reset();//Id del formulario
    $('#Insertar-estadoCivil').modal('show');//Id del modal el primero
}

/*este metodo se ejecuta al darle click al boton modificar
y lo que hace es extraer el Id del registro y con este consultar a la base de datos a traves de los modelos, la informacion del registro que queremos modificar*/
function actualizarModal(Id)
{ 
    $.ajax({
        url: api + 'get',
        type: 'post',
        data:{
            Id_estado_civil: Id 
        },
        datatype: 'json'
    })

    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response))
        {
            const resultado = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción

            if(resultado.status)
            {   //dataset es el resultado de la consulta que devuelve la API
                //Este resultado es un array con los datos
                $('#Id_estado-civil').val(resultado.dataset.Id_estado_civil);                       
                $('#EstadoCivil').val(resultado.dataset.Estado_civil);//id de cada input
                //en caso de que alla más input ponen sus respectivos id            
                $('#modificar-estadoCivil').modal('show');//id del modal modificar, el primer id
            }else{
                sweetAlert(2, resultado.exception, null);
                console.log(response);
            }

        }else{
            console.log(response);
        } 
    })

    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Función para modificar un registro seleccionado previamente
//Id del formulario que esta dentro del modal modificar
$('#actualizar-estado').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'update',
        type: 'post',
        data: $('#actualizar-estado').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const resultado = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (resultado.status) {
                $('#modificar-estadoCivil').modal('hide');//Id del modal modificar
                showTable();
                sweetAlert(1, resultado.message, null);
            } else {
                sweetAlert(2, resultado.exception, null);
                console.log(response);
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

// Función para crear un nuevo registro
//Id del formulario insertar
$('#Insertar-estadoCivil').submit(function()
{   
    event.preventDefault();
    $.ajax({
        url: api + 'create',
        type: 'post',
        data: $('#Insertar-estadoCivil').serialize(),
        datatype: 'json'
    })

    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const resultado = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (resultado.status) {
                $('#estadoCivil-insertar')[0].reset();//Id del formulario insertar
                $('#Insertar-estadoCivil').modal('hide');//Id del modal insertar, el primer id que se coloca xd
                showTable();
                sweetAlert(1, resultado.message, null);
            } else {
                sweetAlert(2, resultado.exception, null);
                console.log(response);
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

// Función para mostrar los resultados de una búsqueda
$('#form-search').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'search',
        type: 'post',
        data: $('#form-search').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
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