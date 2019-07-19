<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Tabla | Datos-Parentesco </title>
	
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
							<h3 class="page-title">Datos parentesco</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
                                <div class="panel">
									<div class="panel-heading">
										<!--<h3 class="panel-title">Datos parentesco</h3>-->
								<!--Boton insertar--><a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
                                                    <th>Parentesco</th>
												</tr>
											</thead>
											<tbody id="tabla-parentesco">
												<tr>
													<td>1</td>
													<td>Papá</td>									
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

			<!--Inicio Modal Modificar-->
<div class="modal fade bd-modificar-modal-xl" id="Parentesco-modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalPuesto">Datos parentesco</h5>
			<button type="submit" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="POST" id="modificar-parentesco">
							<div class="form-row">
									<div class="form-group col-md-12">
											<input type="hidden" id="Id_parentesco" name="Id_parentesco">	
											<label for="Parentesco">Parentesco</label>
											<input type="text" class="form-control" id="Parentesco" aria-describedby="parentescoHelp" placeholder="Parentesco" name="Parentesco" required>
											<small id="parentescoHelp" class="form-text text-muted"></small>
									</div>
							</div>
							</div>
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" >Modificar</button>
			</form>
		</div>
		</div>
	</div>  <!--Fin del modal modificar-->

<!--Inicio Modal Insertar-->
<div class="modal fade bd-modificar-modal-xl" id="parentescoInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos de parentesco</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="insertarParentesco">
							<div class="form-group col-md-12">							
									<label for="Parentesco">Parentesco</label>
									<input type="text" class="form-control" id="Parentesco" aria-describedby="parentescoHelp" placeholder="Parentesco" name="Parentesco" required> 
									<small id="parentescoHelp" class="form-text text-muted"></small>
							</div>
						
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Agregar</button>
			</form>
		</div>
		</div>
	</div>  <!--Fin del modal Insertar-->
	
	<!--Modals para editar perfil-->
	<?php
	require_once '../Backend/core/helpers/perfil.php';
	?>

	<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/parentesco.js"></script>	
		
	</body>
</html>