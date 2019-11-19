$(document).ready(function()
{
    showTable();//al instante para cargar la tabla con la información
    happyBirthday();
    blockingTime();

});

// Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../../RHOppoFineExpo/Backend/core/api/area-detalle.php?action=';
const api2 = '../../RHOppoFineExpo/Backend/core/api/area-laboral.php?action=';

function fillTable(rows)
{
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para interpolar las varibles con el string
    let contenido = '';

    rows.forEach(function(fila){
        //son comillas invertidas no simple ni dobles
        contenido+= `
            <tr>
                <td>${fila.codigo}</td>
                <td>${fila.nombres}</td>
                <td>${fila.apellidos}</td>
                <td>${fila.sueldo}</td>
                <td>${fila.fechaingreso}</td>
                <td>${fila.inicio}</td>
                <td>${fila.fin}</td>
                <td>${fila.hora}</td>
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${fila.Id_area_detalle})">Modificar</a></td>
                <td><a class="btn btn-primary btn-sm" onclick="confirmDelete('${api}', ${fila.Id_area_detalle}, null, 'disable')">Deshabilitar</a></td> 
                <td><a class="btn btn-danger btn-sm" onclick="confirmDelete('${api}', ${fila.Id_area_detalle}, null, 'delete')">Eliminar</a></td>
            </tr>       
        `;//invertidas
        //Los nombres de Id_religion o Religion sin excatamente iguales a los campos de la base de datos en esa tabla
        //si su tabla tiene mas campos agregarlos aqui un <tr> es una fila acurdense y los <td> son las columnas de es fila

   });
   //id del tbody en la tabla correspondiente
   $('#tabla-areadetalle').html(contenido); 
      
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
    $('#agregarDetalleusuario')[0].reset();//Id del formulario
    fillSelect(api2, 'LaboralA', null);//llenar el combo
    $('#areadetalleAgregar').modal('show');//Id del modal
}

/*este metodo se ejecuta al darle click al boton modificar
y lo que hace es extraer el Id del registro y con este consultar a la base de datos a traves de los modelos, la informacion del registro que queremos modificar*/
function actualizarModal(Id)
{   //Id_religion es el parametro para la consulta
    $.ajax({
        url: api + 'get',
        type: 'post',
        data:{
            Id_area_detalle: Id
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
                $('#Id_area_laboral').val(resultado.dataset.Id_area_detalle);           
                $('#LaboralB').val(resultado.dataset.Id_laboral);//id de cada input
                $('#ColaboradorB').val(resultado.dataset.Id_colaborador);
                //en caso de que alla más input ponen sus respectivos id            
                $('#detalleareaModificar').modal('show');//id del modal modificar
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
$('#modificarDetallearea').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: api + 'update',
        type: 'post',
        data: $('#modificarDetallearea').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const resultado = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (resultado.status) {
                $('#detalleareaModificar').modal('hide');//Id del modal modificar
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

//ESTO LO COMENZAREMOS EL VIERNES EN LA TARDE

// Función para crear un nuevo registro
//Id del del formulario insertar
$('#agregarDetalleusuario').submit(function()
{   
    event.preventDefault();
    $.ajax({
        url: api + 'create',
        type: 'post',
        data: $('#agregarDetalleusuario').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const resultado = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (resultado.status) {
                $('#agregarDetalleusuario')[0].reset();//Id del formulario insertar
                $('#areadetalleAgregar').modal('hide');//Id del modal insertar
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
