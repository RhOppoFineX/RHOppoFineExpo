<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Religión </title>

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
					<div class="container"><!--Boton Agregar--->
						<div class="row">
							<div class="col-sm-6 offset-sm-2">
								<a type="button" class="btn btn-primary btn-lg btn-block" onclick="modalCreate()">Agregar nuevo registro</a>
							</div>
						</div>
					</div>
					<div class="main-content">
						<div class="container-fluid">
							<h3 class="page-title">Datos de Religión</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
							<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Datos religiosos</h3>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>Religion</th>
												</tr>
											</thead>
											<tbody id="tabla-religion">
												<tr>
													<td>1</td>
													<td>Catolico</td>									
													<td><a class="btn btn-warning btn-sm" data-toggle="modal" onclick="modalUpdate()">Modificar</a></td>
													<td><a class="btn btn-danger btn-sm" data-toggle="modal" onclick="confirmDelete()">Deshabilitar</a></td>
												</tr>
												<tr>
													<td>2</td>	
													<td>Protestante</td>
													<td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#religionModificar">Modificar</button></td>
													<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">Deshabilitar</button></td>
													
												</tr>
												<tr>
													<td>3</td>
													<td>Testigo de Jehova</td>
													<td><button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#religionModificar">Modificar</button></td>
													<td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalEliminar">Deshabilitar</button></td>	
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

			<!-- Modal -->
<div class="modal fade bd-modificar-modal-xl" id="religionModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
					<form method="post" id="actualizarReligion">
							<div class="form-group col-md-12">
									<label for="Religion">Religión</label>
									<input type="text" class="form-control" id="Religion" aria-describedby="religionHelp" placeholder="Religión">
									<small id="religionHelp" class="form-text text-muted"></small>
							</div>
						</form>
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" data-dismiss="modal">Modficar</button>
		</div>
		</div>
	</div>  <!--Fin del modal-->
	
	
		<!--Modal Deshabilitar-->

	<!-- Button trigger modal -->

	
	<!-- Modal -->
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

	<!-- Modal Insertar-->
<div class="modal fade bd-modificar-modal-xl" id="religionInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
					<form method="post" id="insertarReligion">
							<div class="form-group col-md-12">
									<label for="Religion">Religión</label>
									<input type="text" class="form-control" id="Religion" aria-describedby="religionHelp" placeholder="Religión">
									<small id="religionHelp" class="form-text text-muted"></small>
							</div>
						</form>
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary" data-dismiss="modal">Modficar</button>
		</div>
		</div>
	</div>  <!--Fin del modal Insertar-->

	<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->

	<script src="../Backend/core/helpers/validator.js"></script>
	<script src="../Backend/core/helpers/components.js"></script>
	<script src="../Backend/core/controllers/Religion.js"></script>	

</body>
</html>