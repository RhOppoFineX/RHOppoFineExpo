<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Municipio </title>

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
													<th>Municipio</th>
                                                    <th>Departamento</th>
												</tr>
											</thead>
											<tbody id="tabla-municipio">

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
			<h5 class="modal-title" id="ModalTitulo">Datos del municipio</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="actualizarMunicipio">
						<div class="form-row">
							<div class="form-group col-md-12">
								<!--nuevo input es invisible-->		
									<label for="Municipio-B">Municipio</label>
									<input type="text" class="form-control" id="Municipio-B" placeholder="Municipio" name="Municipio-B" required>		
							</div>
							<div class="input-field col s12 m6">
								<label for="Departamento-B">Departamento</label>
                    			<select id="Departamento-B" name="Departamento-B" class="form-control">
                    			</select>
                			</div>
							<input type="hidden" id="Id_municipio" name="Id_municipio">
						</div>
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Modificar</button><!--Quitarle el data-dismiss-->
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
						<div class="form-row">
							<div class="form-group col-md-12">
									<label for="Municipio-A">Municipio</label>
									<input type="text" class="form-control" id="Municipio-A" placeholder="Municipio" name="Municipio-A">
									<small id="municipioHelp" class="form-text text-muted"></small>
							</div>
                            <div class="input-field col s12 m6">
								<label for="Departamento-A">Departamento</label>
                    			<select id="Departamento-A" name="Departamento-A" class="form-control">
                    			</select>
                			</div>
						</div>
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Agregar</button><!--Quitarle el data-dismiss-->
			</form><!--Bajar esta etiqueta de cierre form hasta aca-->
		</div>
		</div>
	</div> <!--Fin del modal Insertar-->

<!--Modals para editar perfil-->
<?php
	require_once '../Backend/core/helpers/perfil.php';
?>

<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/Municipio.js"></script>	<!--Solo dejar el script del controlador-->
	<!--Los primeros scripts siempre son los mismos el que cambia es el controlador-->
		

</body>
</html>