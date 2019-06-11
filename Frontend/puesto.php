<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Puestos </title>
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
						<h3 class="page-title">Datos de los Puestos</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
                                <div class="panel">
									<div class="panel-heading">
									<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped" id="TablaPuesto">
											<thead>
												<tr>
													<th>#</th>
													<th>Puesto</th>
												</tr>
											</thead>
											<tbody id="tabla-puesto">
												<tr>						
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

			<!-- Modal Puesto Modificar -->
<div class="modal fade bd-modificar-modal-xl" id="puestoModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos del Puesto</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="actualizarPuesto">
							<div class="form-group col-md-12">
									<!--nuevo input es invisible-->	<input type="hidden" id="Id_puesto" name="Id_puesto">	
									<label for="Puesto">Puesto</label>
									<input type="text" class="form-control" id="Puesto" aria-describedby="puestoHelp" placeholder="Puesto" name="Puesto">
									<small id="puestoHelp" class="form-text text-muted"></small>
							</div>
					</div>
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Modificar</button>
			</form>
		</div>
		</div>
	</div>

	<!-- Modal Puesto Insertar -->
<div class="modal fade bd-modificar-modal-xl" id="puestoInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalPuesto">Datos del Puesto</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="insertarPuesto">
									<div class="form-group col-md-12">	
											<label for="exampleInputPuesto1">Puesto</label>
											<input type="text" class="form-control" id="Puesto" aria-describedby="puestoHelp" placeholder="Puesto" name="Puesto">
											<small id="puestoHelp" class="form-text text-muted"></small>
									</div>
					</div>
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Agregar</button>
			</form>
		</div>
		</div>
	</div>	
		

    <!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->

	<script src="../Backend/libraries/sweetalert.min.js"></script><!--Libreria para los mensajes de confirmacion-->
	<script src="../Backend/core/helpers/validator.js"></script>
	<script src="../Backend/core/helpers/components.js"></script>
	<script src="../Backend/core/controllers/Puesto.js"></script>	
	<!--Los primeros Tres scripts siempre son los mismos el que cambia son los controladores-->
</body>
</html>