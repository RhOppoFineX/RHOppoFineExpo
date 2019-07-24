$(document).ready(function()
{
    showTable();//al instante para cargar la tabla con la información
});

// Constante para establecer la ruta y parámetros de comunicación con la API
const apiMunicipio = '../../RHOppoFineExpo/Backend/core/api/Municipio.php?action=';

const tablaPadre = '../../RHOppoFineExpo/Backend/core/api/Departamento.php?action=read';

function fillTable(rows)
{
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para interpolar las varibles con el string
    let content = '';

    rows.forEach(function(row){
        //son comillas invertidas no simple ni dobles
        content+= `
            <tr>
                <td>${row.Municipio}</td>	
                <td>${row.Departamento}</td>					
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${row.Id_municipio})">Modificar</a></td>
				<td><a class="btn btn-danger btn-sm" onclick="confirmDelete('${apiMunicipio}', ${row.Id_municipio}, null)">Deshabilitar</a></td>
            </tr>       
        `;//invertidas
        //Los nombres de Id_religion o Religion sin excatamente iguales a los campos de la base de datos en esa tabla
        //si su tabla tiene mas campos agregarlos aqui un <tr> es una fila acurdense y los <td> son las columnas de es fila

   });
   //id del tbody en la tabla correspondiente
   $('#tabla-municipio').html(content); 
      
}
//funcion para mostrar la tabla
function showTable()
{
    $.ajax({
        url: apiMunicipio + 'read',
        type: 'post',
        data: null,
        datatype: 'json'            
    })

    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if(isJSONString(response)){
            const result = JSON.parse(response);
             // Se comprueba si el resultado ha fallado si es asi se mostrara una IOException ksk
            if(!result.status)
            {
                sweetAlert(4, result.exception, null);
            }                
            fillTable(result.dataset);
            //dataset es el resultado de la consulta que devuelve la API
            //Este resultado es un array con los datos  

        }else{
            console.log(response);
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
    $('#insertarMunicipio')[0].reset();//Id del formulario
    fillSelect(tablaPadre, 'Departamento-A', null);
    $('#municipioInsertar').modal('show');//Id del modal
}

/*este metodo se ejecuta al darle click al boton modificar
y lo que hace es extraer el Id del registro y con este consultar a la base de datos a traves de los modelos, la informacion del registro que queremos modificar*/
function actualizarModal(Id)
{   //Id_religion es el parametro para la consulta
    $.ajax({
        url: apiMunicipio + 'get',
        type: 'post',
        data:{
            Id_municipio: Id
        },
        datatype: 'json'
    })

    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado consola
        if (isJSONString(response))
        {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción

            if(result.status)
            {   //dataset es el resultado de la consulta que devuelve la API
                //Este resultado es un array con los datos
                $('#Id_municipio').val(result.dataset.Id_municipio);                       
                $('#Municipio-B').val(result.dataset.Municipio);//id de cada input            
                fillSelect(tablaPadre, 'Departamento-B', result.dataset.Id_departamento);
                $('#municipioModificar').modal('show');//id del modal modificar
            }else{
                sweetAlert(2, result.exception, null);
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
$('#actualizarMunicipio').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiMunicipio + 'update',
        type: 'post',
        data: new FormData($('#actualizarMunicipio')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#municipioModificar').modal('hide');//Id del modal modificar
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

//ESTO LO COMENZAREMOS EL VIERNES EN LA TARDE

// Función para crear un nuevo registro
//Id del del formulario insertar
$('#insertarMunicipio').submit(function()
{   
    event.preventDefault();
    $.ajax({
        url: apiMunicipio + 'create',
        type: 'post',
        data: new FormData($('#insertarMunicipio')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#municipioInsertar').modal('hide');//Id del modal insertar
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
