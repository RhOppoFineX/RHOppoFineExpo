<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos Identificacion </title>
	
	<?php
		require_once '../backend/core/helpers/css.php';	//Hojas de estilos CSS
	?>
</head>
<body>
	<?php
		//Control de Sesión y privilegios de Usuario				
		// require_once '../backend/core/helpers/sesion.php';
		// Session::iniSession();
		// $_SESSION['Tipo_usuario_privilegios'] = ['Admin'];
		// Session::verifcarPrivilegio();
	?>

	<div id="wrapper">
			<?php
				require_once '../backend/core/helpers/menu.php';	
			?>
				<!--Incio de la Table-->
				<div class="main">
					<div class="main-content">
						<div class="container-fluid">
							<h3 class="page-title">Datos Identificacion</h3>							
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
                                <div class="panel">
									<div class="panel-heading">
										<!--Boton Agregar-->												
										<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>
										<!--Switch-->																			

									</div>
									<div class="panel-body no-padding">
										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>													
                                                        <th>Numero Documento</th>
														<th>Residencia</th>
														<th>Lugar de expedicion</th>
														<th>Fecha de expedicion</th>
														<th>Profesion</th>
														<th>Estado Civil</th>
														<th>Fecha de expiracion</th>
														<th>Numero ISSS</th>
														<th>AFP</th>														
														<th>NUP</th>
														<th>Tipo de Documento</th>
														<th>Colaborador</th>
													</tr>
												</thead>
												<tbody id="tabla-datos-identificacion">
													
												</tbody>
											</table>
										</div>
									</div>
								</div>                            
								<!-- END TABLE STRIPED -->
							</div>														
						</div>
					</div><!-- END MAIN CONTENT -->
				</div><!-- END MAIN --><!--Fin de la Table-->
			</div>	<!--Wrapper Fin-->

		<!-- Modal modificar Colaboradores-->
<div class="modal fade bd-modificar-modal-xl" id="modal-colaborador-up-iden" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Datos de identificacion</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="form-colaborador-up">
							<div class="form-row">
							<div class="form-group col-md-4">
									<label for="Telefono_casa_up">Telefono de casa</label>
									<input type="text" class="form-control" id="Telefono_casa_up" placeholder="2222-2222" name="Telefono_casa_up" required>									
								</div>

								<div class="form-group col-md-4">
									<label for="Telefono_celular_up">Telefono de celular</label>
									<input type="text" class="form-control" id="Telefono_celular_up" placeholder="7777-7777" name="Telefono_celular_up" required>					
								</div>

								<div class="form-group col-md-7">
									<label for="Correo_up">Correo electonico</label>
									<input type="email" class="form-control" id="Correo_up" placeholder="Correo Institucional" name="Correo_up" required>
									
								</div>								

								<div class="form-group col-md-5">
									<label for="Religion_up">Religion</label>
									<select id="Religion_up" name="Religion_up" class="form-control" required>
									
									</select>								
								</div>

								<div class="form-group col-md-5">
									<label for="Municipio_up">Municipio</label>
									<select id="Municipio_up" name="Municipio_up" class="form-control" required>
									
									</select>								
								</div>

								<div class="form-group col-md-4">
									<label for="NIP_up">Número de NIP</label>
									<input type="number" class="form-control" id="NIP_up" placeholder="numero de NIP" name="NIP_up" required>					
								</div>
								
								<div class="form-group col-md-4">
									<label for="Nivel_up">Número de Nivel</label>
									<input type="number" class="form-control" id="Nivel_up" placeholder="numero de Nivel" name="Nivel_up" required>					
								</div>

								<div class="form-group col-md-5">
									<label for="Estudiando_up"> Estado </label>
									<select id="Estudiando_up" name="Estudiando_up" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">Trabajador</option>
 										<option value="1">Estudiante</option>
									</select>								
								</div>

								<div class="form-group col-md-6">
									<label for="Direccion_up">Direccion Residencial</label>
									<textarea rows="4" cols="50" id="Direccion_up" name="Direccion_up" required>

									</textarea>
								</div>
							<!--Input invisible--><input type="hidden" id="Id_colaborador_up" name="Id_colaborador_up">								
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
</div>  <!--Fin del modal modificar colaboradores-->		




	<!-- Modal agregar Colaboradores-->
<div class="modal fade bd-modificar-modal-xl" id="modal-colaborador-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title" id="ModalTitulo">Datos de los Colaboradores</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="form-colaborador-add">
							<div class="form-row">

								<div class="form-group col-md-6">
									<label for="NumeroDocumento">Numero de Documento</label>
									<input type="Text" class="form-control" id="NumeroDocumento" placeholder="Numero Documento" name="NumeroDocumento" required>
								</div>

								<div class="form-group col-md-12">
									<label for="Direccion">Direccion Residencial</label>
									<textarea rows="4" cols="50" id="Direccion" name="Direccion" required>

									</textarea>
								</div>	

								<div class="form-group col-md-6">
									<label for="LugarExpedicion">LugarExpedicion</label>
									<input type="Text" class="form-control" id="LugarExpedicion" placeholder="LugarExpedicion" name="LugarExpedicion" required>
								</div>

								<div class="form-group col-md-6">
									<label for="FechaExpedicion">FechaExpedicion</label>
									<input type="date" class="form-control" id="FechaExpedicion" placeholder="FechaExpedicion" name="FechaExpedicion" required>
								</div>

								<div class="form-group col-md-6">
									<label for="Profesion">Profesion</label>
									<input id="Profesion" name="Profesion" placeholder="Profesion" class="form-control" required>
																
								</div>

								<div class="form-group col-md-6">
									<label for="Estado_civil">Estado civil</label>
									<select id="Estado_civil" name="Estado_civil" class="form-control" required>
									
									</select>								
								</div>

								<div class="form-group col-md-6">
									<label for="FechaExpepiracion">FechaExpiracion</label>
									<input type="date" class="form-control" id="FechaExpiracion" placeholder="FechaExpiracion" name="FechaExpiracion" required>
								</div>
	
								<div class="form-group col-md-6">
									<label for="NumeroISSS">Numero de ISSS</label>
									<input type="text" class="form-control" id="NumeroISSS" placeholder="Numero de ISSS" name="NumeroISSS" required>									
								</div>

								<div class="form-group col-md-6">
									<label for="AFP">AFP</label>
									<input type="text" class="form-control" id="AFP" placeholder="numero de AFP" name="AFP" required>					
								</div>

								<div class="form-group col-md-6">
									<label for="NUP">Número de NUP</label>
									<input type="number" class="form-control" id="NUP" placeholder="numero de NUP" name="NUP" required>					
								</div>
								

								<div class="form-group col-md-6">
									<label for="DUI"> Tipo Documento </label>
									<select id="DUI" name="DUI" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">Carnet de Residente</option>
 										<option value="1">DUI</option>
									</select>								
								</div>		
								
								<div class="form-group col-md-6">
									<label for="Colaborador">Colaborador</label>
									<select id="Colaborador" name="Colaborador" class="form-control" required>
									
									</select>								
								</div>												
													
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
</div>  <!--Fin del modal agregar colaboradores-->

<!--Modals para editar perfil-->
<?php
	require_once '../Backend/core/helpers/perfil.php';
?>

<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/datos-identificacion.js"></script>	<!--Solo dejar el script del controlador-->
	<!--Los primeros scripts siempre son los mismos el que cambia es el controlador-->
	
</body>
</html>


