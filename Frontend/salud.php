<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos de salud </title>
	
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
							<h3 class="page-title">Datos salud</h3>							
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
                                                        <th>Enfermedades en Tratamiento</th>
														<th>Medicamentos</th>
														<th>Alergias</th>
														<th>Alergias_medicamentos</th>
														<th>Codigo</th>
														<th>Nombres</th>
														<th>Apellidos</th>																	

													</tr>
												</thead>
												<tbody id="tabla-datos-salud">
													
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

		




	<!-- Modal agregar datos_identificacion Colaboradores-->
<div class="modal fade bd-modificar-modal-xl" id="modal-salud-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title" id="ModalTitulo">Datos salud de los Colaboradores</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="form-salud-add">
							<div class="form-row">

								<div class="form-group col-md-6">
									<label for="Enfermedad-Tratamiento"> Enfermedad en Tratamiento</label>
									<select id="Enfermedad-Tratamiento" name="Enfermedad-Tratamiento" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">NO</option>
 										<option value="1">SI</option>
									</select>								
								</div>
								

								<div class="form-group col-md-12">
									<label for="Descripcion-Enfermedad">Descripcion de Enfermedad</label>
									<textarea rows="4" cols="50" id="Descripcion-Enfermedad" name="Descripcion-Enfermedad" required>

									</textarea>
								</div>

								<div class="form-group col-md-6">
									<label for="Medicamentos">Medicamentos</label>
									<select id="Medicamentos" name="Medicamentos" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">NO</option>
 										<option value="1">SI</option>
									</select>								
								</div>
								

								<div class="form-group col-md-12">
									<label for="Descripcion-Medicamentos">Descripcion de Medicamentos</label>
									<textarea rows="4" cols="50" id="Descripcion-Medicamentos" name="Descripcion-Medicamentos" required>

									</textarea>
								</div>			

								<div class="form-group col-md-6">
									<label for="Alergias"> Alergias en Tratamiento</label>
									<select id="Alergias" name="Alergias" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">NO</option>
 										<option value="1">SI</option>
									</select>								
								</div>
								

								<div class="form-group col-md-12">
									<label for="Descripcion-Alergias">Descripcion de Alergias</label>
									<textarea rows="4" cols="50" id="Descripcion-Alergias" name="Descripcion-Alergias" required>

									</textarea>
								</div>			


								<div class="form-group col-md-6">
									<label for="Alergias-Medicamentos"> Alergias a Medicamentos </label>
									<select id="Alergias-Medicamentos" name="Alergias-Medicamentos" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">NO</option>
 										<option value="1">SI</option>
									</select>								
								</div>
								

								<div class="form-group col-md-12">
									<label for="Descripcion-Alergias-Medicamentos">Descripcion de Alergias a Medicamentos</label>
									<textarea rows="4" cols="50" id="Descripcion-Alergias-Medicamentos" name="Descripcion-Alergias-Medicamentos" required>

									</textarea>
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
</div>  <!--Fin del modal agregar datos_identificacion colaboradores-->


<!-- Modal Modificar datos_identificacion Colaboradores-->
<div class="modal fade bd-modificar-modal-xl" id="modal-salud-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title" id="ModalTitulo">Datos salud de los Colaboradores</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="form-salud-up">
							<div class="form-row">								
								<div class="form-group col-md-6">
									<label for="Enfermedad-Tratamiento-up"> Enfermedad en Tratamiento</label>
									<select id="Enfermedad-Tratamiento-up" name="Enfermedad-Tratamiento-up" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">NO</option>
 										<option value="1">SI</option>
									</select>								
								</div>
								

								<div class="form-group col-md-12">
									<label for="Descripcion-Enfermedad-up">Descripcion de Enfermedad</label>
									<textarea rows="4" cols="50" id="Descripcion-Enfermedad-up" name="Descripcion-Enfermedad-up" required>

									</textarea>
								</div>

								<div class="form-group col-md-6">
									<label for="Medicamentos-up">Medicamentos</label>
									<select id="Medicamentos-up" name="Medicamentos-up" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">NO</option>
 										<option value="1">SI</option>
									</select>								
								</div>
								

								<div class="form-group col-md-12">
									<label for="Descripcion-Medicamentos-up">Descripcion de Medicamentos</label>
									<textarea rows="4" cols="50" id="Descripcion-Medicamentos-up" name="Descripcion-Medicamentos-up" required>

									</textarea>
								</div>			

								<div class="form-group col-md-6">
									<label for="Alergias-up"> Alergias en Tratamiento</label>
									<select id="Alergias-up" name="Alergias-up" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">NO</option>
 										<option value="1">SI</option>
									</select>								
								</div>
								

								<div class="form-group col-md-12">
									<label for="Descripcion-Alergias-up">Descripcion de Alergias</label>
									<textarea rows="4" cols="50" id="Descripcion-Alergias-up" name="Descripcion-Alergias-up" required>

									</textarea>
								</div>			


								<div class="form-group col-md-6">
									<label for="Alergias-Medicamentos-up"> Alergias a Medicamentos </label>
									<select id="Alergias-Medicamentos-up" name="Alergias-Medicamentos-up" class="form-control" required>
										<option value="" disabled selected>Seleccione una opción</option>
										<option value="0">NO</option>
 										<option value="1">SI</option>
									</select>								
								</div>
								

								<div class="form-group col-md-12">
									<label for="Descripcion-Alergias-Medicamentos-up">Descripcion de Alergias a Medicamentos</label>
									<textarea rows="4" cols="50" id="Descripcion-Alergias-Medicamentos-up" name="Descripcion-Alergias-Medicamentos-up" required>

									</textarea>
								</div>
											

								<!--Input invisible--><input type="hidden" id="Id_salud" name="Id_salud">
								
																				
													
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
</div>  <!--Fin del modal Modificar datos_identificacion colaboradores-->

<!--Modals para editar perfil-->
<?php
	require_once '../Backend/core/helpers/perfil.php';
?>

<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/salud.js"></script>	<!--Solo dejar el script del controlador-->
	<!--Los primeros scripts siempre son los mismos el que cambia es el controlador-->
	
</body>
</html>