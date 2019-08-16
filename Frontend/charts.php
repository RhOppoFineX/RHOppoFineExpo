<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Graficas | Charts </title>

	<?php
		require_once '../backend/core/helpers/css.php';	//Hojas de estilos CSS
	?>
	
</head>
<body> 

	<div id="wrapper">
			<?php
				require_once '../backend/core/helpers/menu.php';	
			?>
								
				<!--Incio de graficas-->
				<div class="main">					
					<div class="main-content">
						<div class="container-fluid">
							<h3 class="page-title">Graficas y Rerportes</h3>
							
							<div class="row">
								
								<div class="col-md-6"> <!--Inicio de grafica--> 
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title"> Tipos de Usuario </h3><!--Titulo de grafica-->									
										</div>
										<div class="panel-body">
											<canvas id='grafico1'></canvas> <!--Id de la grafica-->
											<a href="../Backend/libraries/reportes/reportetipousuario.php" target="_blank" class="btn btn-primary btn-block"> Reporte </a>
										</div>
									</div>
								</div><!--Fin de grafica-->

								<div class="col-md-6"> <!--Inicio de grafica--> 
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title"> Colaboradores por genero </h3><!--Titulo de grafica-->
										</div>
										<div class="panel-body">
											<canvas id='genero-colaboradores'></canvas> <!--Id de la grafica-->
											<a href="../Backend/libraries/reportes/reportegenero.php" target="_blank" class="btn btn-primary btn-block"> Reporte </a>
										</div>
									</div>
								</div><!--Fin de grafica-->

								<div class="col-md-6"> <!--Inicio de grafica--> 
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title"> Colaboradores por religion </h3><!--Titulo de grafica-->
										</div>
										<div class="panel-body">
											<canvas id='religion-colaboradores'></canvas> <!--Id de la grafica-->
											<a href="../Backend/libraries/reportes/reportereligion.php" target="_blank" class="btn btn-primary btn-block"> Reporte </a>
										</div>
									</div>
								</div><!--Fin de grafica-->

								<div class="col-md-6"> <!--Inicio de grafica--> 
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title"> Colaboradores por Nivel academico </h3><!--Titulo de grafica-->
										</div>
										<div class="panel-body">
											<canvas id='academico-colaboradores'></canvas> <!--Id de la grafica-->
											<a href="../Backend/libraries/reportes/reportenivelacademico.php" target="_blank" class="btn btn-primary btn-block"> Reporte </a>
										</div>
									</div>
								</div><!--Fin de grafica-->

								
								<div class="col-md-6"> <!--Inicio de grafica--> 
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title"> Colaboradores por servicio </h3><!--Titulo de grafica-->									
										</div>
										<div class="panel-body">
											<canvas id='graficoservicio'></canvas> <!--Id de la grafica-->
											<a href="../Backend/libraries/reportes/reporteservicio.php" target="_blank" class="btn btn-primary btn-block"> Reporte </a>
										</div>
									</div>
								</div><!--Fin de grafica-->

								
								<div class="col-md-6"> <!--Inicio de grafica--> 
									<div class="panel">
										<div class="panel-heading">
											<h3 class="panel-title"> Colaboradores por departamento </h3><!--Titulo de grafica-->									
										</div>
										<div class="panel-body">
											<canvas id='graficoDepartamento'></canvas> <!--Id de la grafica-->
											<a href="../Backend/libraries/reportes/reportedepartamento.php" target="_blank" class="btn btn-primary btn-block"> Reporte </a>
										</div>
									</div>
								</div><!--Fin de grafica--> 

								<div class="col-md-6"> <!--Inicio de grafica parametrizada--> 
									<div class="panel">
										<div class="panel-heading">									

											<h3 class="panel-title"> Colaboradores por municipio </h3><!--Titulo de grafica parametrizada-->					
											
										</div>
										<div class="panel-body">
											<canvas id='graficoMunicipio'></canvas> <!--Id de la grafica-->
											<a onclick="reporteMunicipio()" class="btn btn-primary btn-block"> Reporte </a>												
										</div>

										<form method="post" id="parametro-municipio">
												<div class="form-row">													
													<div class="input-field col s12 m6">
														<label for="Departamento">Departamento</label>
														<select id="Departamento" name="Departamento" class="form-control">
														</select>
													</div>
												</div>
											<a onclick="graficoMunicipio()" class="btn btn-warning btn-block">Generar Grafico</a>
										</form>
									</div>
								</div><!--Fin de grafica parametrizada-->

								<div class="col-md-6"> <!--Inicio de grafica parametrizada--> 
									<div class="panel">
										<div class="panel-heading">									

											<h3 class="panel-title"> Salario de Colaboradores por Genero </h3><!--Titulo de grafica parametrizada-->				
											
										</div>
										<div class="panel-body">
											<canvas id='grafico-genero-salario'></canvas> <!--Id de la grafica-->
											<a onclick="reporteAreaGenero()" target="_blank" class="btn btn-primary btn-block"> Reporte </a>												
										</div>

										<form method="post" id="parametro-genero-salario">
												<div class="form-row">													
													<div class="input-field col s12 m6">
														<label for="Genero">Genero</label>
														<select id="Genero" name="Genero" class="form-control">
															<option value disabled selected>Seleccione una opción</option>
															<option value="M"> Hombres </option>
															<option value="F"> Mujeres </option>
														</select>
													</div>
												</div>
											<a onclick="graficoAreaGenero()" class="btn btn-warning btn-block">Generar Grafico</a>
										</form>
									</div>
								</div><!--Fin de grafica parametrizada-->

							</div>
							
						</div>
					</div><!-- END MAIN CONTENT -->
				</div><!-- END MAIN --><!--Fin de graficas-->
	</div>	<!--Wrapper Fin-->

	<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<script src="../Backend/libraries/Chart.min.js"></script>
	<!--Script de charts js-->
	<script src="../Backend/core/controllers/charts.js"></script>
		

</body>
</html>


