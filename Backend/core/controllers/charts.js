$(document).ready(function(){
    graficoEjemplo();
})

const apiGraficos = '../../RHOppoFineExpo/Backend/core/api/usuarios.php?action=';


function graficoEjemplo()
{
    $.ajax({
        url: apiGraficos + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la apiGraficos es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (!result.status) {
                sweetAlert(4, result.exception, null);
            }

            let id = [];
                let cantidad = [];
                result.dataset.forEach(function (rows) {
                    id.push(rows.IdProducto);
                    cantidad.push(rows.nombre);
                });
            //grafico1 es el ID de la etiqueta canvas en html
            graficoBarra('grafico1', cantidad, id, 'Cantidad de producto', 'Grafico');
            
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });       

}