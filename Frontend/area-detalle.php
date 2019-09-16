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
									<a type="button" class="btn btn-success btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped" id="TablaArea">
											<thead>
												<tr>
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
	
<!-- Modal agregar usuarios-->
<div class="modal fade bd-modificar-modal-xl" id="areadetalleAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Datos del areá detalle</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="agregarDetalleusuario" autocomplete="off">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="LaboralA">Id laboral</label>
									<select id="LaboralA" name="LaboralA" class="form-control" required>
									</select>						
								</div>
								<div class="form-group col-md-4">
									<label for="ColaboradorA">Id colaborador</label>
									<select id="ColaboradorA" name="ColaboradorA" class="form-control" required>
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
</div>  <!--Fin del modal agregar usuarios-->

<!-- Modal Modificar usuarios-->
<div class="modal fade bd-modificar-modal-xl" id="detalleareaModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Datos del areá detalle</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="modificarDetallearea" autocomplete="off">
                        <div class="form-row">
						<div class="form-group col-md-4">
									<label for="LaboralB">Id laboral</label>
									<select id="LaboralB" name="LaboralB" class="form-control" required>
									</select>						
								</div>
								<div class="form-group col-md-4">
									<label for="ColaboradorB">Id colaborador</label>
									<select id="ColaboradorB" name="ColaboradorB" class="form-control" required>
									</select>						
								</div>	

				<!--Input invisible--><input type="hidden" id="Id_area_detalle" name="Id_area_detalle">
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
    </div>  <!--Fin del modal modificar usuarios-->



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