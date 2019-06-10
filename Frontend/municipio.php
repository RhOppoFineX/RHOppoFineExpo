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
							<h3 class="page-title">Datos de los municipios</h3>
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
													<th>Municipio</th>
                                                    <th>Departamento</th>
												</tr>
											</thead>
											<tbody id="tabla-municipio">
												<tr>									
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

			<!-- Modal Modificar Municipio-->
<div class="modal fade bd-modificar-modal-xl" id="municipioModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos del municipio</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="actualizarMunicipio">
							<div class="form-group col-md-12">
								<!--nuevo input es invisible-->	<input type="hidden" id="Id_municipio" name="Id_municipio">	
									<label for="Municipio">Municipio</label>
									<input type="text" class="form-control" id="MunicipioID" aria-describedby="municipioHelp" placeholder="Religión" name="MunicipioID"><!--Agreguen los name="" mismo que el id-->
									<small id="municipioHelp" class="form-text text-muted"></small>			
							</div>
                            <div class="form-group col-md-4">
										<label for="genero-datosDepartamento">Departamento</label>
										<select id="Departamento2" class="form-control">											
											<option>San Salvador</option>
											<option>Sonsonate</option>
										</select>
								</div>
						
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Modficar</button><!--Quitarle el data-dismiss-->
			</form><!--Bajar esta etiqueta de cierre form hasta aca-->
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

				<!-- Modal Insertar Municipio-->
<div class="modal fade bd-modificar-modal-xl" id="municipioInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos del municipio</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="insertarMunicipio">
							<div class="form-group col-md-12">
									<label for="Municipio">Municipio</label>
									<input type="text" class="form-control" id="MunicipioID2" aria-describedby="municipioHelp" placeholder="Municipio" name="MunicipioID2"><!--Agreguen los name="" mismo que el id-->
									<small id="municipioHelp" class="form-text text-muted"></small>			
							</div>
                            <div class="form-group col-md-4">
										<label for="genero-datosDepartamento">Departamento</label>
										<select id="Departamento" class="form-control">											
											<option>San Salvador</option>
											<option>Sonsonate</option>
										</select>
								</div>
						
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Agregar</button><!--Quitarle el data-dismiss-->
			</form><!--Bajar esta etiqueta de cierre form hasta aca-->
		</div>
		</div>
	</div> <!--Fin del modal Insertar-->

	<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->

	<script src="../Backend/libraries/sweetalert.min.js"></script><!--Libreria para los mensajes de confirmacion-->
	<script src="../Backend/core/helpers/validator.js"></script>
	<script src="../Backend/core/helpers/components.js"></script>
	<script src="../Backend/core/controllers/Municipio.js"></script>
	<!--Los primeros Tres scripts siempre son los mismos el que cambia son los controladores-->
		

</body>
</html>