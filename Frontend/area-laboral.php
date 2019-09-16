<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Area laboral </title>
	
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
							<h3 class="page-title">Datos de las areás laborales</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
                                <div class="panel">
									<div class="panel-heading">
										<!--Boton Agregar-->												
										<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>										
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped" id="Tablaidioma">
											<thead>
												<tr>													
                                                    <th>#</th>
                                                    <th>Area</th>
                                                    <th>Puesto</th>
                                                    <th>Sueldo plaza</th>
                                                    <th>Fecha ingreso</th>
                                                    <th>Inicio contrato</th>
                                                    <th>Fin contrato</th>
                                                    <th>Horas laborales</th>
												</tr>
											</thead>
											<tbody id="tabla-laboral">
												
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

<!-- Modal Modificar idioma-->
<div class="modal fade bd-modificar-modal-xl" id="arealaboralModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Datos de idioma</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="modificarArealaboral" autocomplete="off">
                        <div class="form-row">
								<div class="form-group col-md-4">
									<label for="AreaB">Id area</label>
									<select id="AreaB" name="AreaB" class="form-control" required>
									</select>						
								</div>
								<div class="form-group col-md-4">
									<label for="PuestoB">Id puesto</label>
									<select id="PuestoB" name="PuestoB" class="form-control" required>
									</select>						
								</div>
								<div class="form-group col-md-12">
									<label for="SueldoB">Sueldo plaza</label>
									<input type="text" class="form-control" id="SueldoB" aria-describedby="areaHelp" placeholder="Área" name="SueldoB" required>
									<small id="areaHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-12">
									<label for="FechaB">Fecha ingreso</label>
									<input type="text" class="form-control" id="FechaB" aria-describedby="areaHelp" placeholder="Área" name="FechaB" required>
									<small id="areaHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-12">
									<label for="InicioB">Inicio contrato</label>
									<input type="text" class="form-control" id="InicioB" aria-describedby="areaHelp" placeholder="Área" name="InicioB" required>
									<small id="areaHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-12">
									<label for="FinB">Fin contrato</label>
									<input type="text" class="form-control" id="FinB" aria-describedby="areaHelp" placeholder="Área" name="FinB" required>
									<small id="areaHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-12">
									<label for="HorasB">Horas al dia</label>
									<input type="text" class="form-control" id="HorasB" aria-describedby="areaHelp" placeholder="Área" name="HorasB" required>
									<small id="areaHelp" class="form-text text-muted"></small>
								</div>
				<!--Input invisible-->		<input type="hidden" id="Id_laboral" name="Id_laboral">
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
    </div>  <!--Fin del modal modificar idioma-->


	<!-- Modal agregar idioma-->
<div class="modal fade bd-modificar-modal-xl" id="arealaboralAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Datos de los idioma</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="agregarArealaboral" autocomplete="off">
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="AreaA">Id area</label>
									<select id="AreaA" name="AreaA" class="form-control" required>
									</select>						
								</div>
								<div class="form-group col-md-4">
									<label for="PuestoA">Id puesto</label>
									<select id="PuestoA" name="PuestoA" class="form-control" required>
									</select>						
								</div>
								<div class="form-group col-md-12">
									<label for="SueldoA">Sueldo plaza</label>
									<input type="text" class="form-control" id="SueldoA" aria-describedby="areaHelp" placeholder="Área" name="SueldoA" required>
									<small id="areaHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-12">
									<label for="FechaA">Fecha ingreso</label>
									<input type="text" class="form-control" id="FechaA" aria-describedby="areaHelp" placeholder="Área" name="FechaA" required>
									<small id="areaHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-12">
									<label for="InicioA">Inicio contrato</label>
									<input type="text" class="form-control" id="InicioA" aria-describedby="areaHelp" placeholder="Área" name="InicioA" required>
									<small id="areaHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-12">
									<label for="FinA">Fin contrato</label>
									<input type="text" class="form-control" id="FinA" aria-describedby="areaHelp" placeholder="Área" name="FinA" required>
									<small id="areaHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-12">
									<label for="HorasA">Horas al dia</label>
									<input type="text" class="form-control" id="HorasA" aria-describedby="areaHelp" placeholder="Área" name="HorasA" required>
									<small id="areaHelp" class="form-text text-muted"></small>
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
</div>  <!--Fin del modal agregar idioma-->


<!--Modals para editar perfil-->
<?php
	require_once '../Backend/core/helpers/perfil.php';
?>

<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/area-laboral.js"></script>	<!--Solo dejar el script del controlador-->
	<!--Los primeros scripts siempre son los mismos el que cambia es el controlador-->
	
</body>
</html>