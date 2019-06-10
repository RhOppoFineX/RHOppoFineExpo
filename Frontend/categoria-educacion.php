<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Categoria Educación </title>

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
										<!--<h3 class="panel-title">Datos categoria</h3>-->
										<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
                                                    <th>Categoria</th>
												</tr>
											</thead>
											<tbody id="tabla-categoria">
												<tr>
													<td>1</td>
													<td>Primaria</td>									
													<td><a class="btn btn-warning btn-sm" data-toggle="modal" onclick="actualizarModal()">Modificar</button></td>
													<td><a class="btn btn-danger btn-sm" data-toggle="modal" onclick="confirmDelete()">Deshabilitar</button></td>

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

			<!--Inicio Modal modificar-->
<div class="modal fade bd-modificar-modal-xl" id="Categoria-modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalPuesto">Datos categoria</h5>
			<button type="submit" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="POST" id="modificar-categoria">
							<div class="form-row">
									<div class="form-group col-md-12">
											<input type="hidden" id="Id_categoria" name="Id_categoria">
											<label for="Categoria">Categoria educacion</label>
											<input type="text" class="form-control" id="Categoria" aria-describedby="puestoHelp" placeholder="categoria" name="Categoria">
											<small id="puestoHelp" class="form-text text-muted"></small>
									</div>
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
	</div>  <!--Fin del modal 1-->



	<!-- Button trigger modal -->
	
	<!-- Inicio Modal deshabilitar-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

	<!--Inicio Modal Insertar-->
<div class="modal fade bd-modificar-modal-xl" id="categoriaInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos de categoria</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="insertarCategoria">
							<div class="form-group col-md-12">							
									<label for="Categoria">Categoria</label>
									<input type="text" class="form-control" id="Categoria" aria-describedby="categoriaHelp" placeholder="Categoria" name="Categoria">
									<small id="categoriaHelp" class="form-text text-muted"></small>
							</div>
						
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Agregar</button><!--Quitarle el data-dismiss-->
			</form><!--Bajar el etiqueta form hasta aca-->
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
	<script src="../Backend/core/controllers/categoria.js"></script>
	<!--Los primeros Tres scripts siempre son los mismos el que cambia son los controladores-->
		
	</body>
</html>