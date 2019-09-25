/*
*   Función para manejar los mensajes de notificación al usuario.
*
*   Expects: type (tipo de mensaje), text (texto a mostrar) y url (dirección para enviar).
*
*   Returns: ninguno.
*/
function sweetAlert(type, text, url)
{
    switch (type) {
        case 1:
            title = "Éxito";
            icon = "success";
            break;
        case 2:
            title = "Error";
            icon = "error";
            break;
        case 3:
            title = "Advertencia";
            icon = "warning";
            break;
        case 4:
            title = "Aviso";
            icon = "info";
    }
    if (url) {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        })
        .then(function(value){
            location.href = url
        });
    } else {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        });
    }
}

/*
*   Función para cargar las opciones en un select de formulario.
*
*   Expects: api (origen de los datos a mostrar), id (identificador del select en el formulario) y selected (valor seleccionado).
*
*   Returns: ninguno.
*/
function fillSelect(api, id, selected)
{
    $.ajax({
        url: api,
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
                let content = '';
                if (!selected) {
                    content += '<option value="" disabled selected>Seleccione una opción</option>';
                }
                result.dataset.forEach(function(row){
                    value = Object.values(row)[0];
                    text = Object.values(row)[1];
                    if (value != selected) {
                        content += `<option value="${value}">${text}</option>`;
                    } else {
                        content += `<option value="${value}" selected>${text}</option>`;
                    }
                });
                $('#' + id).html(content);
            } else {
                $('#' + id).html('<option value="">No hay opciones</option>');
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

/*
*   Función para eliminar un registro seleccionado
*
*   Expects: api (ruta del servidor para borrar un registro), id (identificador del registro a eliminar) y file (nombre del arhivo a eliminar).
*
*   Returns: ninguno.
*/
function confirmDelete(api, id, file, operacion)
{
    var opcion = operacion === 'delete' ? 'eliminar' : 'deshabilitar'; 
  
    swal({
        title: 'Advertencia',
        text: '¿Desea ' + opcion + ' el registro?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            let params = new Object();
            (file) ? params = {identifier: id, filename: file} : params = {identifier: id};
            $.ajax({
                url: api + operacion,//delete y disable según sea la operación
                type: 'post',
                data: params,
                datatype: 'json'
            })
            .done(function(response){
                // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
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
        }
    });
}

/*
*   Función para generar un gráfico de barras
*
*   Expects: canvas (identificador de la etiqueta canvas), xAxis (datos para el eje X), yAxis (datos para el eje Y), legend (etiqueta para los datos) y title (título del gráfico).
*
*   Returns: ninguno.
*/
function barGraph(canvas, xAxis, yAxis, legend, title, tipo)
{
    let colors = [];
    for (i = 0; i < xAxis.length; i++) {
        colors.push('#' + (Math.random().toString(16)).substring(2, 8));
    }
    var categorias = tipo != 'bar' ? true : false;
    const context = $('#' + canvas);
    const chart = new Chart(context, {
        type: tipo,
        data: {
            labels: xAxis,
            datasets: [{
                label: legend,
                data: yAxis,
                backgroundColor: colors,
                borderColor: '#000000',
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: categorias
            },
            title: {
                display: true,
                text: title
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}

//verifica si es un texto html o string 

function isHtmlString(htmlText)
{
    var htmlArray = $.parseHTML(htmlText);

    var isHtml = htmlArray.filter(function(e){ return e instanceof HTMLElement;}).length;

    console.log(htmlText);
    //console.log(htmlArray);

    if (isHtml){
        console.log(isHtml + " HTML Element(s) found.");
        return 'Error Contacte con el administrador';
    }
    else{
        console.log("No HTML Elements found!");
        return htmlText;
    }
}

function verColaborador()
{
    
}



/*
*   Función para generar un gráfico de barras
*
*   Expects: canvas (identificador de la etiqueta canvas), xAxis (datos para el eje X), yAxis (datos para el eje Y), legend (etiqueta para los datos) y title (título del gráfico).
*
*   Returns: ninguno.
*/
function barGraphPrueba(canvas, xAxis, yAxis, legend, title)
{
    let colors = [];
    for (i = 0; i < xAxis.length; i++) {

        var color = (Math.random().toString(16)).substring(2, 8);
        var verificacion = true;

        for(j = 0; j < colors.length; j++)
        {
            if(color === colors[j])
                verificacion = false;                                     
        }
        
        if(verificacion)
        {
            colors.push('#' + color);
        }

        else
        {          
            do {
                color = (Math.random().toString(16)).substring(2, 8);

                for(j = 0; j < colors.length; j++)
                {
                    if(color === colors[j])
                        verificacion = false;                                     
                }                                            
                
            } while(!verificacion)

            colors.push('#' + color);
        }
            
    }
    const context = $('#' + canvas);
    const chart = new Chart(context, {
        type: 'bar',
        data: {
            labels: xAxis,
            datasets: [{
                label: legend,
                data: yAxis,
                backgroundColor: colors,
                borderColor: '#000000',
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: title
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}
