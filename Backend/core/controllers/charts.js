$(document).ready(function(){
    graficoUsuarios();
    graficoGenero();
})

const apiGraficos = '../../RHOppoFineExpo/Backend/core/api/graficos.php?action=';


function graficoUsuarios()
{
    $.ajax({
        url: apiGraficos + 'usuarios',
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
            barGraph('grafico1', Cantidad, Usuario, 'Cantidad de usuarios', 'Grafico', 'bar');//el ultimo parametro es el tipo de grafica bar para barras y pie para pastel y doughnut para circular
            
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });       

}

function graficoGenero()
{
    $.ajax({
        url: apiGraficos + 'genero',
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

                let Colaborador = [];
                let Genero = [];
                
                result.dataset.forEach(fila => {
                    var porcentaje = (fila.Colaborador * 100) / fila.Total;//esta fi;a no la usen para otros
                    Colaborador.push(fila.Colaborador);//fila.nombre_que_le pusieron_despues_del_AS_en_la_consulta
                    Genero.push(fila.Genero);//fila.nombre_que_le pusieron_despues_del_AS_en_la_consulta
                });

            //grafico1 es el ID de la etiqueta canvas en html
            barGraph('genero-colaboradores', Genero, Colaborador, 'Cantidad de Colaboradores', 'Grafico', 'doughnut');//el ultimo parametro es el tipo de grafica bar para barras y pie para pastel y doughnut para circular
            
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });       

}