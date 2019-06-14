<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Colaborador </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
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
														
								<h3 class="page-title">Datos del Colaborador</h3><!--Titulo-->								
							
							<div class="col-md-12">
								<!-- TABLE STRIPED -->
							<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Datos Personales</h3>										
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>Nombres</th>
													<th>Apellidos</th>
													<th>Username</th>
													<th>Celular</th>
													<th>Correo</th>
													<th>DUI</th>
													<th>Información</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Steve</td>
													<td>Jobs</td>
													<td>@steve</td>	
													<td>7945-7590</td>
													<td>wasd@ioexception.com</td>												
													<td>95548-1516</td>
													<td><a type="button" class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Ver datos</a></td>
												</tr>
												<tr>
													<td>2</td>	
													<td>Simon</td>
													<td>Philips</td>
													<td>@simon</td>
													<td>7945-7590</td>
													<td>wasd@ioexception.com</td>
													<td>95548-1516</td>
													<td><a type="button" class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Ver datos</a></td>
													
												</tr>
												<tr>
													<td>3</td>
													<td>Jane</td>
													<td>Doe</td>
													<td>@jane</td>
													<td>7945-7590</td>
													<td>wasd@ioexception.com</td>
													<td>95548-1516</td>
													<td><a type="button" class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Ver datos</a></td>
													
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
						<form method="POST" id="modificar-datosColaborador">
								<div class="form-row">
									<div class="form-group col-md-6"><!--Nombres y Apellidos-->
										<label for="nombres-datosColaborador">Nombres</label>
										<input type="Text" class="form-control" id="nombres-datosColaborador" placeholder="Nombres">
									</div>
									<div class="form-group col-md-6">
										<label for="apellidos-datosColaborador">Apellidos</label>
										<input type="Text" class="form-control" id="apellidos-datosColaborador" placeholder="Apellidos">
									</div>
								</div>
								<div class="form-group col-md-4"><!--Genero-->
										<label for="genero-datosColaborador">Genero</label>
										<select id="genero-datosColaborador" class="form-control">											
											<option>Masculino</option>
											<option>Femenino</option>
										</select>
								</div>

								<div class="form-group col-md-4"><!--Genero-->
									<label for="fecha-datosColaborador">Fecha de Nacimiento</label>
									<select id="fecha-datosColaborador" class="form-control">											
										<option>26-08-2002</option>
										<option>30-10-2000</option>
									</select>
								</div>

								<div class="form-group col-md-4">
									<label for="edad-datosColaborador">Edad</label>
									<input type="text" class="form-control" id="edad-datosColaborador" placeholder="16" disabled>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
												<label for="nacionalidad-datosColaborador">Nacionalidad</label>
										<select id="nacionalidad-datosColaborador" class="form-control">											
											<option>Salvadoreño/a</option>
											<option>Guatmalteco/a</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="estadoCivil-datosColaborador">Estado Civil</label>
										<select id="estadoCivil-datosColaborador" class="form-control">
											<option>Soltero/a</option>
											<option>Casado/a</option>
											<option>Divorciado/a</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="religion-datosColaborador">Religión</label>
										<select id="religion-datosColaborador" class="form-control">
												<option>Catolico/a</option>
												<option>Evangelico/a</option>
												<option>Mormon/a</option>
												<option>Testigo de Jehova</option>
												<option>Amnostico</option>
										</select>									
										
									</div>

									<div class="form-group col-md-4">
											<label for="celular-datosColaborador">Celular</label>
											<input type="Text" class="form-control" id="celular-datosColaborador" placeholder="Número celular">
									</div>

									<div class="form-group col-md-4">
											<label for="telefono-datosColaborador">Telefono de Casa</label>
											<input type="Text" class="form-control" id="telefono-datosColaborador" placeholder="Número Tel. Casa">
									</div>

									<div class="form-group col-md-4">
											<label for="dui-datosColaborador">DUI</label>
											<input type="Text" class="form-control" id="dui-datosColaborador" placeholder="DUI">
									</div>
								</div>

								<div class="form-group col-md-12">
										<label for="correo-datosColaborador">Correo Institucional</label>
    								<input type="email" class="form-control" id="correo-datosColaborador" aria-describedby="emailHelp" placeholder="Correo Institucional">
    								<small id="emailHelp" class="form-text text-muted"></small>
								</div>
								</div>

								<!-- <div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="gridCheck">
										<label class="form-check-label" for="gridCheck">
											Check me out
										</label>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Sign in</button> -->
							</form>
				</div>			  
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  <button type="submit" class="btn btn-primary" data-dismiss="modal">Modificar</button>
			</div>
		  </div>
		</div>

				<!-- <div class="modal fade bd-modificar-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-xl">
					  <div class="modal-content">
						<input type="text" class="form-control" placeholder="text field">
						<button type="button" class="btn btn-danger btn-sm">Deshabilitar</button>
					  </div>
					</div>
				  </div>			 -->
	<!--Fin del modal--> 


	<!--Modal Deshabilitar-->

	<!-- Button trigger modal -->

	
	<!-- Modal -->
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
				 <h2>¿Ver más datos de este Colaborador?</h2>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-warning" data-dismiss="modal">Ver</button>
				</div>
			</div>
		</div>
	</div>

	<!--Fin del modal Deshabilitar-->	




  	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>	
</body>
</html>