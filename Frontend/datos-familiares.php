<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-familiares </title>
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
							<h3 class="page-title">Datos familiares</h3>
							<div class="col-md-12">
								<!-- TABLE STRIPED -->
							<div class="panel">
									<div class="panel-heading">
									<!--Boton agregar-->
										<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro<span class="lnr lnr-file-add"></span></a>
								<!--Switch-->		
									</div>
									<div class="panel-body no-padding">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Nombres</th>
													<th>Apellidos</th>
													<th>Fecha Nacimiento</th>
													<th>Dependiente</th>
													<th>Parentesco</th>
													<th>Colaborador</th>
													<th>Genero</th>
													<th>Telefono</th>
												</tr>
											</thead>
											<tbody id="tabla-datosFamiliares">
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

			<!-- Modal modificar Colaboradores-->
<div class="modal fade bd-modificar-modal-xl" id="modal-familiares-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Familiares de los Colaboradores</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="form-familiares-up">
							<div class="form-row">

								<div class="form-group col-md-6">
									<label for="Dependiente-up">Dependiente</label>
									<select id="Dependiente-up" name="Dependiente-up" class="form-control" required>
										<option value="" disable selected>Seleccione una opción</option>
										<option value="0">Independiente</option>
										<option value="1">Dependiente</option>
									</select>
								</div>

								<div class="form-group col-md-6">
									<label for="Telefono-up">Telefono</label>
									<input type="text" class="form-control" id="Telefono-up" placeholder="Telefono" name="Telefono-up" required>
								</div>

								<!--Input invisible--><input type="hidden" id="Id-familiar-up" name="Id-familiar-up">

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
</div>  <!--Fin del modal modificar colaboradores-->		




	<!-- Modal agregar Colaboradores-->
<div class="modal fade bd-modificar-modal-xl" id="modal-familiares-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Familiares de los Colaboradores</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="form-familiares-add">
							<div class="form-row">

								<div class="form-group col-md-6">
									<label for="Nombres">Nombres</label>
									<input type="text" class="form-control" id="Nombres" placeholder="Nombres" name="Nombres" required>
								</div>	

								<div class="form-group col-md-6">
									<label for="Apellidos">Apellidos</label>
									<input type="text" class="form-control" id="Apellidos" placeholder="Apellidos" name="Apellidos" required>
								</div>

								<div class="form-group col-md-6">
									<label for="Fecha-Nacimiento">Fecha Nacimiento</label>
									<input type="date" class="form-control" id="Fecha-Nacimiento" placeholder="Fecha Nacimiento" name="Fecha-Nacimiento" required>
								</div>

								<div class="form-group col-md-6">
									<label for="Dependiente">Dependiente</label>
									<select id="Dependiente" name="Dependiente" class="form-control" required>
										<option value="" disable selected>Seleccione una opción</option>
										<option value="0">Independiente</option>
										<option value="1">Dependiente</option>
									</select>
								</div>

								<div class="form-group col-md-6">
									<label for="Parentesco">Parentesco</label>
									<select id="Parentesco" name="Parentesco" class="form-control" required>

									</select>
								</div>

								<div class="form-group col-md-6">
									<label for="Colaborador">Colaborador</label>
									<select id="Colaborador" name="Colaborador" class="form-control" required>
										
									</select>
								</div>

								<div class="form-group col-md-6">
									<label for="Genero">Genero</label>	
									<select id="Genero" name="Genero" class="form-control" required>
										<option value="" disable selected>Seleccione una opcion</option>
										<option value="F">Femenino</option>
										<option value="M">Masculino</option>
									</select>	
								</div>

								<div class="form-group col-md-6">
									<label for="Telefono">Telefono</label>
									<input type="text" class="form-control" id="Telefono" placeholder="Telefono" name="Telefono" required>
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
	
	<script src="../Backend/core/controllers/datos-familiares.js"></script>	
	<script>
	</script>
</body>
</html>