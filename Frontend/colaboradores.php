<!DOCTYPE html>
<html lang="es">
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
		
<<<<<<< HEAD:Frontend/colaboradores.php
		<!-- NAVBAR -->
			<nav class="navbar navbar-default navbar-fixed-top">
					<div class="brand">
						<a href="index.html"><img src="assets/img/logo-ricaldone.png" alt="Klorofil Logo" class="img-responsive logo" width="100px" height="100px"></a>
					</div>
					<div class="container-fluid">
						<div class="navbar-btn">
							<button type="submit" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
						</div>
						<form class="navbar-form navbar-left">
							<div class="input-group">
								<input type="text" value="" class="form-control" placeholder="Buscar Colaborador">
								<span class="input-group-btn"><button type="submit" class="btn btn-warning">Go</button></span>
							</div>
						</form>
						<!-- <div class="navbar-btn navbar-btn-right">
							<a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</div> -->
						<div id="navbar-menu">
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
										 Notificaciones
										<i class="lnr lnr-alarm"></i>
										<span class="badge bg-danger">5</span>
									</a>
									<ul class="dropdown-menu notifications">
										<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>5 Colaboradores añadidos</a></li>
										<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>2 Personas necesitan renovar Dui</a></li>
										<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Estamos Bien</a></li>
										<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
										<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
										<li><a href="#" class="more">Ver más Notificaiones</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Estado del Colaborador</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#">Activo</a></li>
										<li><a href="#">Inactivo</a></li>	
										<li><a href="#">Permanente</a></li>									
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-graduation-hat"></i> <span>Servicios Profesionales(Colegio)</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#"><i class="lnr"></i> <span>Pilet</span></a></li>
										<li><a href="#"><i class="lnr"></i> <span>Cursos Libres de Natacion</span></a></li>
										<li><a href="#"><i class="lnr"></i> <span>Cursos de nivelación</span></a></li>
										<li><a href="#"><i class="lnr"></i> <span>Interinatos</span></a></li>
										<li><a href="#"><i class="lnr"></i> <span>Otros Servicios</span></a></li>
									</ul>
								</li>
								<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-license"></i> <span>Insafort</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
										<ul class="dropdown-menu">
											<li><a href="#"><i class="lnr"></i> <span>Contratación Permanente en Proyectos</span></a></li>										
											
										</ul>
								</li>
								<!-- <li>
									<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
								</li> -->
							</ul>
						</div>
					</div>
				</nav>
				<!-- END NAVBAR -->
				
				<!-- LEFT SIDEBAR -->
			<div id="sidebar-nav" class="sidebar">
					<div class="sidebar-scroll">
						<nav><!--Principal-->
							<ul class="nav">
								<li><a href="index.html" class="active"><i class="lnr lnr-home"></i> <span>Principal</span></a></li>
							<li><a href="datos-colaborador.php" class=""><i class="lnr lnr-file-empty"></i> <span>Colaboradores</span></a></li>													
								<li><a href="elements.html" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li>
								<li><a href="charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
								<li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
								<li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
								<li>
									<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
									<div id="subPages" class="collapse ">
										<ul class="nav">
											<li><a href="page-profile.html" class="">Profile</a></li>
											<li><a href="page-login.html" class="">Login</a></li>
											<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
										</ul>
									</div>
								</li>
								
								<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
								<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
								<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
							</ul>
						</nav>
					</div>
				</div>
				<!-- END LEFT SIDEBAR -->
=======
		<?php
		require_once '../backend/core/helpers/menu.php';
		?>

>>>>>>> 7f3581f59b800e5b608beb7b5aa994a572938aac:Frontend/colaboradores.php
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
						<form method="POST" id="modificar-colaborador">
								<div class="form-row">
									<div class="form-group col-md-6"><!--Nombres y Apellidos-->
										<label for="nombres-colaborador">Nombres</label>
										<input type="Text" class="form-control" id="nombres-colaborador" placeholder="Nombres">
									</div>
									<div class="form-group col-md-6">
										<label for="inputPassword4">Apellidos</label>
										<input type="Text" class="form-control" id="inputPassword4" placeholder="Apellidos">
									</div>
								</div>
								<div class="form-group col-md-4"><!--Genero-->
										<label for="genero-colaborador">Genero</label>
										<select id="genero-colaborador" class="form-control">											
											<option>Masculino</option>
											<option>Femenino</option>
										</select>
								</div>

								<div class="form-group col-md-4"><!--Genero-->
									<label for="fecha-colaborador">Fecha de Nacimiento</label>
									<select id="fecha-colaborador" class="form-control">											
										<option>26-08-2002</option>
										<option>30-10-2000</option>
									</select>
								</div>

								<div class="form-group col-md-4">
									<label for="edad-colaborador">Edad</label>
									<input type="text" class="form-control" id="edad-colaborador" placeholder="16" disabled>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
												<label for="nacionalidad-colaborador">Nacionalidad</label>
										<select id="nacionalidad-colaborador" class="form-control">											
											<option>Salvadoreño/a</option>
											<option>Guatmalteco/a</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="estadoCivil-colaborador">Estado Civil</label>
										<select id="estadoCivil-colaborador" class="form-control">
											<option>Soltero/a</option>
											<option>Casado/a</option>
											<option>Divorciado/a</option>
										</select>
									</div>
									<div class="form-group col-md-4">
										<label for="religion-colaborador">Religión</label>
										<select id="religion-colaborador" class="form-control">
												<option>Catolico/a</option>
												<option>Evangelico/a</option>
												<option>Mormon/a</option>
												<option>Testigo de Jehova</option>
												<option>Amnostico</option>
										</select>									
										
									</div>

									<div class="form-group col-md-4">
											<label for="celular-colaborador">Celular</label>
											<input type="Text" class="form-control" id="celular-colaborador" placeholder="Número celular">
									</div>

									<div class="form-group col-md-4">
											<label for="telefono-colaborador">Telefono de Casa</label>
											<input type="Text" class="form-control" id="telefono-colaborador" placeholder="Número Tel. Casa">
									</div>

									<div class="form-group col-md-4">
											<label for="dui-colaborador">DUI</label>
											<input type="Text" class="form-control" id="dui-colaborador" placeholder="DUI">
									</div>
								</div>

								<div class="form-group col-md-12">
										<label for="correo-colaborador">Correo Institucional</label>
    								<input type="email" class="form-control" id="correo-colaborador" aria-describedby="emailHelp" placeholder="Correo Institucional">
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
					<a type="button" class="btn btn-warning" href="datos-colaborador.php">Ver</a>
				</div>
			</div>
		</div>
	</div>

	<!--Fin del modal Deshabilitar-->	




<!--Modals para editar perfil-->
<?php
	require_once '../Backend/core/helpers/perfil.php';
?>

<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/nacionalidad.js"></script>	<!--Solo dejar el script del controlador-->
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