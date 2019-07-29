<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Area Detalle </title>
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
						<h3 class="page-title">Datos del Área</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->

                                <div class="panel">
									<div class="panel-heading">
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped" id="TablaArea">
											<thead>
												<tr>
													<th>#</th>
													<th>Codigo</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Sueldo</th>
                                                    <th>Fecha ingreso</th>
                                                    <th>Inicio contrato</th>
                                                    <th>Fin contrato</th>
                                                    <th>Horas al diá</th>
												</tr>
											</thead>
											<tbody id="tabla-areadetalle">
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

    <!--Scripts necesarios siempre-->
<!--Modals para editar perfil-->
<?php
	require_once '../Backend/core/helpers/perfil.php';
?>

<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/area-detalle.js"></script>	<!--Solo dejar el script del controlador-->
	<!--Los primeros scripts siempre son los mismos el que cambia es el controlador-->
</body>
</html>