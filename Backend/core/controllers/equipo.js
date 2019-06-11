$(document).ready(function()
{
    showTable();
})

// Constante para establecer la ruta y parámetros de comunicación con la apiUsuario
const apiEquipo = '../../RHOppoFineExpo/Backend/core/api/Equipo.php?action=';
const tablaPadre = '../../RHOppoFineExpo/Backend/core/api/Tipo-equipo.php?action=read';

// Función para llenar tabla con los datos de los registros
function fillTable(rows)
{
    let content = '';
    // Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        content += `
            <tr>                
                <td>${row.Nombres_usuario}</td>            
                <td>${row.Tipo_usuario}</td>
                <td><a class="btn btn-warning btn-sm" onclick="actualizarModal(${row.Id_usuario})">Modificar</a></td>
				<td><a class="btn btn-danger btn-sm" onclick="confirmDelete('${apiUsuario}', ${row.Id_usuario}, null)">Deshabilitar</a></td> 
            </tr>
        `;
    });
    $('#tabla-usuario').html(content);   
}