<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Religión </title>

	<?php
		require_once '../backend/core/helpers/css.php';	//Hojas de estilos CSS
	?>
	
</head>
<body> <!--Indicaiones:
		1) al formularios de actiualizar a los input tambien llevan name="Valor Del Id" 
		2) Mover la etiqueta </form> hacia donde se indica en todos los modales con formualrio (Eliminar No)
		3) Quitar el data-dismiss de loa botones de modificar, insertar y eliminar
		4) Agregar el input invisible a los formularios de Modificar-->

	<div id="wrapper">
			<?php
				require_once '../backend/core/helpers/menu.php';	
			?>
								
				<!--Incio de la Table-->
				<div class="main">					
					<div class="main-content">
						<div class="container-fluid">
							<h3 class="page-title">Datos nivel idioma</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
							<div class="panel">
									<div class="panel-heading"><!--Acabo de modificar el boton y quitar el titulo-->
										<!-- <h3 class="panel-title">Datos religiosos</h3> -->										
										<!--Boton Agregar--->												
										<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>												
											
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>nivel idioma</th>
												</tr>
											</thead>
											<tbody id="tabla-nivelidioma">
												<tr>
													<td>1</td>
													<td>Español</td>									
													<td><a class="btn btn-warning btn-sm" data-toggle="modal" onclick="actualizarModal()">Modificar</a></td>
													<td><a class="btn btn-danger btn-sm" data-toggle="modal" onclick="confirmDelete()">Deshabilitar</a></td>
												</tr><!--Los registros solo son de prueba recuerden pueden borrarlos si quieren en este caso solo deje uno-->						
											</tbody>
										</table>
									</div>
                                </div>
								<!-- END TABLE STRIPED -->
							</div>														
						</div>
					</div><!-- END MAIN CONTENT -->
				</div><!-- END MAIN --><!--Fin de la Table-->
			</div>	<!--Wrapper Fin-->

			<!-- Modal Modificar-->
<div class="modal fade bd-modificar-modal-xl" id="nivelidiomaModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos nivel idioma</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="actualizarnivelidioma">
							<div class="form-group col-md-12">
								<!--nuevo input es invisible-->	<input type="hidden" id="id_nivel_idioma" name="id_nivel_idioma">	
									<label for="nivelidioma">idioma</label>
									<input type="text" class="form-control" id="nivelIdioma" aria-describedby="nivelidiomaHelp" placeholder="Nivel idioma" name="nivelidioma"><!--Agreguen los name="" mismo que el id-->
									<small id="nivelidiomaHelp" class="form-text text-muted"></small>
									
							</div>
						
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Modficar</button><!--Quitarle el data-dismiss-->
			</form><!--Bajar esta etiqueta de cierre form hasta aca-->
		</div>
		</div>
	</div>  <!--Fin del modal modificar-->

	<!-- Button trigger modal -->

	
	<!-- Modal Elimiar-->
	<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Deshabilitación</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				 <h2>¿Desea Deshabilitar?</h2>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary" data-dismiss="modal">Deshabilitar</button>
				</div>
			</div>
		</div>
	</div>

	<!--Fin del modal Deshabilitar-->

	<!--Inicio Modal Insertar-->
<div class="modal fade bd-modificar-modal-xl" id="nivelidiomaInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos de nivel idioma</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="insertarnivelidioma">
							<div class="form-group col-md-12">							
									<label for="nivelidioma">Idioma</label>
									<input type="text" class="form-control" id="nivelIdioma" aria-describedby="nivelidiomaHelp" placeholder="Religión" name="nivelidioma">
									<small id="nivelidiomaHelp" class="form-text text-muted"></small>
							</div>
						
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Agregar</button><!--Quitarle el data-dismiss-->
			</form><!--Bajar el etiqueta form hasta aca-->
		</div>
		</div>
	</div>  <!--Fin del modal Insertar-->

	<!--Scripts necesarios siempre-->
	<!--Modals para editar perfil-->
<?php
	require_once '../Backend/core/helpers/perfil.php';
?>

<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/usuarios.js"></script>	<!--Solo dejar el script del controlador-->
	<!--Los primeros scripts siempre son los mismos el que cambia es el controlador-->
		

</body>
</html>