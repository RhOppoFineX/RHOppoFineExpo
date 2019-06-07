<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos categoria </title>
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
							<h3 class="page-title">Más datos de los colaboradores</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
                                <div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Datos categoria</h3>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
                                                    <th>Categoria</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>---</td>									
													<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal1">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>
												</tr>
												<tr>
													<td>2</td>	
													<td>---</td>
													<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal1">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>							
												</tr>
												<tr>
													<td>3</td>
													<td>---</td>
													<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal1">Modificar</button></td>
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
				</div><!-- END MAIN --><!--Fin de la Table-->
			</div>	<!--Wrapper Fin-->

			<!-- Modal 1-->
<div class="modal fade bd-modificar-modal-xl" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
											<label for="Categoria">Categoria educacion</label>
											<input type="text" class="form-control" id="Categoria" aria-describedby="puestoHelp" placeholder="categoria..."><!--Cambiarle el Id a cada input de modo que sea unico y no se repita-->
											<small id="puestoHelp" class="form-text text-muted"></small>
									</div>
							</div>
							</div>
						</form>
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" data-dismiss="modal">Modificar</button>
		</div>
		</div>
	</div>  <!--Fin del modal 1-->

		<!--Modal Deshabilitar-->

	<!-- Button trigger modal -->

	
	<!-- Modal deshabilitar-->
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





    <script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
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