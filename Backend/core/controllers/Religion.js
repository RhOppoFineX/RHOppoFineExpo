$(document).ready(function()
{

});

// Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../api/Religion.php?action=';

function fillTable(filas)
{
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para interpolar las varibles con el string
    let contenido = '';

   filas.forEach(fila => {
        
        contenido+= `
            <tr>
                <td>${fila.Id_religion}</td>
                <td>${fila.Religion}</td>							
                <td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#religionModificar">Modificar</button></td>
                <td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">Deshabilitar</button></td>
            </tr>       
        `;

   });

   $('#tabla-religion').html(contenido);
      
}

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
            }                
            fillTable(resultado.dataset);

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
    $('#form-create')[0].reset();
    $('#modal-create').modal('open');
}

/*este meetodo se ejecuta al darle click al boton modificar
y lo que hace es extraer el Id del registro y con este consultar a la base de datos a traves de los modelos, la informacion del registro que queremos modificar*/
function actualizarModal(Id)
{   //Id_religion es el parametro para la consulta
    $.ajax({
        url: api + 'get',
        type: 'post',
        data:{
            Id_religion: Id
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
            {
                $('#Religion').val(resultado.dataset.Religion);
                $('#actualizarReligion').modal('show');
            }else{
                sweetAlert(2, resultado.exception, null);
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





