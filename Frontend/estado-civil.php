<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Estado civil </title>
	
	<?php
		require_once '../backend/core/helpers/css.php';	//Hojas de estilos CSS
	?>

</head>
<body>

	<div id="wrapper">

				<?php
					require_once '../backend/core/helpers/menu.php';
				?>
				
				<!--Incio de la Table-->
				<div class="main">
					<div class="main-content">
						<div class="container-fluid">
							<h3 class="page-title">Más datos de los colaboradores</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
                                <div class="panel">
									<div class="panel-heading">
										<!--<h3 class="panel-title">Datos estado civil</h3>-->
										<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>	
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
                                                    <th>Estado civil</th>
												</tr>
											</thead>
											<tbody id="tabla-estado">
												<tr>
													<td>1</td>
													<td>Viudo</td>									
													<td><a class="btn btn-warning btn-sm" data-toggle="modal" onclick="actualizarModal()">Modificar</a></td>
													<td><a class="btn btn-danger btn-sm" data-toggle="modal" onclick="confirmDelete()">Deshabilitar</a></td>
													</tr>
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

			<!-- Inicio Modal Modificar-->
<div class="modal fade bd-modificar-modal-xl" id="modificar-estadoCivil" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalPuesto">Datos estado civil</h5>
			<button type="submit" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="POST" id="actualizar-estado">
							<div class="form-row">
									<div class="form-group col-md-12">
			<!--nuevo inpunt es invisible--><input type="hidden" id="Id_estado-civil" name="Id_estado-civil">
											<label for="EstadoCivil">Estado civil</label>
											<input type="text" class="form-control" id="EstadoCivil" aria-describedby="puestoHelp" placeholder="Estado civil" name="EstadoCivil">
											<small id="puestoHelp" class="form-text text-muted"></small>
								</div>
							</div>
				</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Modificar</button>
			</form>
		</div>
		</div>
	</div>  <!--Fin del modal modificar-->

	<!-- Button trigger modal -->
	
	<!-- Inicio Modal Deshabilitar -->
	<div class="modal fade" id="eliminar-estado-civil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Deshabilitación</h5>
					<button type="submit" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				 <h2>¿Desea Deshabilitarlo?</h2>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary" data-dismiss="modal">Deshabilitar</button>
				</div>
			</div>
		</div>
	</div>

	<!--Fin del modal Deshabilitar-->	

	<!--Inicio modal insertar -->

	<div class="modal fade bd-modificar-modal-xl" id="Insertar-estadoCivil" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos de la Religión</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="estadoCivil-Insertar">
							<div class="form-group col-md-12">							
									<label for="EstadoCivil">Estado Civil</label>
									<input type="text" class="form-control" id="EstadoCivil" aria-describedby="estadoHelp" placeholder="Estado Civil" name="EstadoCivil">
									<small id="estadoHelp" class="form-text text-muted"></small>
							</div>
						
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Agregar</button><!--Quitarle el data-dismiss-->
			</form>
		</div>
		</div>
	</div>  <!--Fin del modal Insertar-->

<!--Scripts necesarios siempre-->
<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->

	<script src="../Backend/libraries/sweetalert.min.js"></script><!--Libreria para los mensajes de confirmacion-->
	<script src="../Backend/core/helpers/validator.js"></script>
	<script src="../Backend/core/helpers/components.js"></script>
	<script src="../Backend/core/controllers/estadoCivil.js"></script>
	<!--Los primeros Tres scripts siempre son los mismos el que cambia son los controladores-->
</body>
</html>