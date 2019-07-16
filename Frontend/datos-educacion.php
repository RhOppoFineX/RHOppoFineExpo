<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">


	<title>Tabla | Datos-educacion </title>

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
					<h3 class="page-title">Datos de educación</h3>
					<div class="col-md-12">
						<!-- TABLE STRIPED -->
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Datos de educación</h3>
							</div>
							<div class="panel-body no-padding">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Bachillerato</th>
											<th>E. Actualmente</th>
											<th>Areas escolares</th>
											<th>NIP</th>
											<th>Especialidad</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>Si.</td>
											<td>Maestria</td>
											<td>.</td>
											<td>.</td>
											<td>Especialidad diseño grafico.</td>
											<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal"
													data-target=".bd-modificar-modal-xl">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>
											
										</tr>
										<tr>
											<td>2</td>
											<td>Si.</td>
											<td>Ingenieria en arquitectura.</td>
											<td>.</td>
											<td>.</td>
											<td>Informatico</td>
											<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal"
													data-target=".bd-modificar-modal-xl">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>
											
										</tr>
										<tr>
											<td>3</td>
											<td>Si.</td>
											<td>Doctorado.</td>
											<td>.</td>
											<td>.</td>
											<td>Contaduria.</td>
											<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal"
													data-target=".bd-modificar-modal-xl">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>
											
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<!-- END TABLE STRIPED -->
					</div>
				</div>
			</div><!-- END MAIN CONTENT -->
		</div><!-- END MAIN -->
		<!--Fin de la Table-->
	</div>
	<!--Wrapper Fin-->

	<!-- Modal modificar-->
<div class="modal fade bd-modificar-modal-xl" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalScrollableTitle">Datos Personales del Colaborador</h5>
		  <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="POST" id="modificar-datosEducacion">
							<div class="form-row">
								<div class="form-group col-md-6"><!--Nombres y Apellidos-->
									<label for="nombres">Nombres</label>
									<input type="Text" class="form-control" id="nombres" placeholder="Nombres" required>
								</div>
								<div class="form-group col-md-6">
									<label for="apellidos">Apellidos</label>
									<input type="Text" class="form-control" id="apellidos" placeholder="Apellidos" required>
								</div>
							</div>
							<div class="form-group col-md-4"><!--Genero-->
									<label for="genero">Genero</label>
									<select id="genero" class="form-control">											
										<option>Masculino</option>
										<option>Femenino</option>
									</select>
							</div>

							<div class="form-group col-md-4"><!--Fecha -->
								<label for="fecha">Fecha de Nacimiento</label>
								<select id="fecha" class="form-control">											
									<option>26-08-2002</option>
									<option>30-10-2000</option>
								</select>
							</div>

							<div class="form-group col-md-4">
								<label for="edad">Edad</label>
								<input type="text" class="form-control" id="edad" placeholder="16" disabled>
							</div>
							<div class="form-row">
								<div class="form-group col-md-4">
											<label for="nacionalidad">Nacionalidad</label>
									<select id="nacionalidad" class="form-control">											
										<option>Salvadoreño/a</option>
										<option>Guatmalteco/a</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="estado-civil">Estado Civil</label>
									<select id="estado-civil" class="form-control">
										<option>Soltero/a</option>
										<option>Casado/a</option>
										<option>Divorciado/a</option>
									</select>
								</div>
								<div class="form-group col-md-4">
									<label for="religion">Religión</label>
									<select id="religion" class="form-control">
											<option>Catolico/a</option>
											<option>Evangelico/a</option>
											<option>Mormon/a</option>
											<option>Testigo de Jehova</option>
											<option>Amnostico</option>
									</select>									
									
								</div>

								<div class="form-group col-md-4">
										<label for="celular">Telefono Celular</label>
										<input type="Text" class="form-control" id="celular" placeholder="Celular" required>
								</div>

								<div class="form-group col-md-4">
										<label for="telefono-Casa">Telefono de Casa</label>
										<input type="Text" class="form-control" id="telefono-Casa" placeholder="Tel. Casa" required>
								</div>

								<div class="form-group col-md-4">
										<label for="dui">DUI</label>
										<input type="Text" class="form-control" id="dui" placeholder="DUI" required>
								</div>
							</div>

							<div class="form-group col-md-12">
									<label for="correo-institucional">Correo Institucional</label>
								<input type="email" class="form-control" id="correo-institucional" aria-describedby="emailHelp" placeholder="Correo Institucional" required>
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
							</div>
						</form>
			</div>			  
		</div>
		<div class="modal-footer">
		  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		  <button type="submit" class="btn btn-primary" data-dismiss="modal">Modficar</button>
		</div>
	  </div>
	</div>
		<!-- Fin modal modificar-->


		<!--Modals para editar perfil-->
		<?php
	require_once '../Backend/core/helpers/perfil.php';
	?>

	<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>

	<!--Scripts para los cruds-->	
	<!--<script src="../Backend/core/controllers/datos-educacion.js"></script>	-->

</body>

</html>