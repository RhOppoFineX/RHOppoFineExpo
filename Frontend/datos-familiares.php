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
										<a type="button" class="btn btn-primary btn-lg" onclick="modalcreate()">Agregar nuevo registro<span class="lnr lnr-file-add"></span></a>
								<!--Switch-->		
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>Nombres</th>
													<th>Apellidos</th>
													<th>Fecha Nacimiento</th>
													<th>Dependiente</th>
													<th>Parentesco</th>
													<th>Colaborador</th>
													<th>Genero</th>
													<th>Telefono</th>
													<th>Estado</th>
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

				<!-- Modal modificar-->
<div class="modal fade bd-modificar-modal-xl" id="modal-DatosFamiliares-up" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos familiares</h5>
			<button type="submit" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="POST" id="form-DatosFamiliares-up">
							<div class="form-row">
								<div class="form-group col-md-6"><!-- Telefono -->
									<label for="Telefono">Telefono</label>
									<input type="Text" class="form-control" id="Telefono" placeholder="Telefono">
								</div>
							</div>
						</form>
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Modficar</button>
		</div>
		</div>
	</div>  <!--Fin del modal modificar-->
	
		
	<!-- Modal deshabilitar -->
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
				 <h2>¿Desea Deshabilitar al Colaborador?</h2>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-secondary" data-dismiss="modal">No</button>
					<button type="submit" class="btn btn-primary" data-dismiss="modal">Deshabilitar</button>
				</div>
			</div>
		</div>
	</div>

	<!--Fin del modal Deshabilitar-->	 

	<!-- Modal insertar-->
<div class="modal fade bd-modificar-modal-xl" id="insertar-DatosFamiliares"	tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-tittle" id="ModalTitulo">Datos familiares</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
			<span aria-hidden="true">&times;</span>
			</button>
		</div>	
			<div class="modal-body">
				<div class="container-fluid">
					<form method="post" id="agregar-DatosFamiliares">
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
								<input type="text" class="form-control" id="Fecha-Nacimiento" placeholder="Fecha Nacimiento" name="Fecha-Nacimiento" required>
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
									<option value="" disable selected>Seleccione una opción</option>
									<option value="1">Papá</option>
									<option value="2">Mamá</option>
									<option value="3">Tío/a</option>
									<option value="4">Hijo/a</option>
									<option value="5">Abuelo/a</option>
									<option value="6">Cuñado/a</option>
									<option value="7">Primo/a</option>
									<option value="8">Novio/a</option>
								</select>
							</div>

							<div class="form-group col-md-6">
								<label for="Colaborador">Colaborador</label>
								<select id="Colaborador" name="Colaborador" class="form-control" required></select>
							<div>

							<div class="form-group col-md-6">
								<label for="Genero">Genero</label>	
								<select id="Genero" name="Genero" class="Genero" class="form-control" required>
									<option value="" disable selected>Seleccione una opcion</option>
									<option value="F">Femenino</option>
									<option value="M">Masculino</option>
								</select>	
							</div>

							<div class="form-group col-md-6">
								<label for="Telefono">Telefono</label>
								<input type="text" class="form-control" id="Telefono" placeholder="Telefono" name="Telefono" required>
							</div>

							<div class="form-group col-md-6">
								<label for="Estado">Estado</label>
								<input type="text" class="form-control" id="Estado" placeholder="Estado" name="Estado" required>
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
	</div>		

	<!-- Fin modal insertar-->


<!--Modals para editar perfil-->
<?php
	require_once '../Backend/core/helpers/perfil.php';
?>

<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds	
	<script src="../Backend/core/controllers/nacionalidad.js"></script>	<Solo dejar el script del controlador-->
	<!--Los primeros scripts siempre son los mismos el que cambia es el controlador-->
	<script>
	// $(function() {
	// 	var data, options;

	// 	// headline charts
	// 	data = {
	// 		labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
	// 		series: [
	// 			[23, 29, 24, 40, 25, 24, 35],
	// 			[14, 25, 18, 34, 29, 38, 44],
	// 		]
	// 	};

	// 	options = {
	// 		height: 300,
	// 		showArea: true,
	// 		showLine: false,
	// 		showPoint: false,
	// 		fullWidth: true,
	// 		axisX: {
	// 			showGrid: false
	// 		},
	// 		lineSmooth: false,
	// 	};

	// 	new Chartist.Line('#headline-chart', data, options);


	// 	// visits trend charts
	// 	data = {
	// 		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
	// 		series: [{
	// 			name: 'series-real',
	// 			data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
	// 		}, {
	// 			name: 'series-projection',
	// 			data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
	// 		}]
	// 	};

	// 	options = {
	// 		fullWidth: true,
	// 		lineSmooth: false,
	// 		height: "270px",
	// 		low: 0,
	// 		high: 'auto',
	// 		series: {
	// 			'series-projection': {
	// 				showArea: true,
	// 				showPoint: false,
	// 				showLine: false
	// 			},
	// 		},
	// 		axisX: {
	// 			showGrid: false,

	// 		},
	// 		axisY: {
	// 			showGrid: false,
	// 			onlyInteger: true,
	// 			offset: 0,
	// 		},
	// 		chartPadding: {
	// 			left: 20,
	// 			right: 20
	// 		}
	// 	};

	// 	new Chartist.Line('#visits-trends-chart', data, options);


	// 	// visits chart
	// 	data = {
	// 		labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
	// 		series: [
	// 			[6384, 6342, 5437, 2764, 3958, 5068, 7654]
	// 		]
	// 	};

	// 	options = {
	// 		height: 300,
	// 		axisX: {
	// 			showGrid: false
	// 		},
	// 	};

	// 	new Chartist.Bar('#visits-chart', data, options);


	// 	// real-time pie chart
	// 	var sysLoad = $('#system-load').easyPieChart({
	// 		size: 130,
	// 		barColor: function(percent) {
	// 			return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
	// 		},
	// 		trackColor: 'rgba(245, 245, 245, 0.8)',
	// 		scaleColor: false,
	// 		lineWidth: 5,
	// 		lineCap: "square",
	// 		animate: 800
	// 	});

	// 	var updateInterval = 3000; // in milliseconds

	// 	setInterval(function() {
	// 		var randomVal;
	// 		randomVal = getRandomInt(0, 100);

	// 		sysLoad.data('easyPieChart').update(randomVal);
	// 		sysLoad.find('.percent').text(randomVal);
	// 	}, updateInterval);

	// 	function getRandomInt(min, max) {
	// 		return Math.floor(Math.random() * (max - min + 1)) + min;
	// 	}

	// });
	</script>
</body>
</html>