$(document).ready(function(){
    graficoEjemplo();
})

const apiGraficos = '../../RHOppoFineExpo/Backend/core/api/graficos.php?action=';


function graficoEjemplo()
{
    $.ajax({
        url: apiGraficos + 'ejemplo',
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

                let Usuario = [];
                let Cantidad = [];
                
                result.dataset.forEach(fila => {
                    Usuario.push(fila.Usuario);//fila.nombre_que_le pusieron_despues_del_AS_en_la_consulta
                    Cantidad.push(fila.Cantidad);//fila.nombre_que_le pusieron_despues_del_AS_en_la_consulta
                });

            //grafico1 es el ID de la etiqueta canvas en html
            barGraph('grafico1', Cantidad, Usuario, 'Cantidad de producto', 'Grafico', 'bar');//el ultimo parametro es el tipo de grafica bar para barras y pie para circular o pastel
            
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });       

}