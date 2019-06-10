<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos equipo </title>
	
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
							<h3 class="page-title">Más datos de los colaboradores</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
                                <div class="panel">
									<div class="panel-heading">
										<!--<h3 class="panel-title">Datos equipo</h3>-->
										<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
                                                    <th>Tipo Equipo</th>
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
                                <!--FIN TABLA 1-->

                                <!-- INICIO TABLA 2--> 
                                <div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Datos equipo</h3>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
                                                    <th>Equipo</th>
                                                    <th>Tipo equipo</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
                                                    <td>---</td>	
                                                    <td>---</td>								
													<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal2">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>
												</tr>
												<tr>
													<td>2</td>	
                                                    <td>---</td>
                                                    <td>---</td>
													<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal2">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>
													
												</tr>
												<tr>
													<td>3</td>
                                                    <td>---</td>
                                                    <td>---</td>
													<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal2">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>	
												</tr>
											</tbody>
										</table>
									</div>
                                </div>
                                <!--FIN TABLA 2-->

                                <!--INICIO TABLA 3-->
                                <div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Datos equipo total</h3>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped">
								 			<thead>
												<tr>
													<th>#</th>
                                                    <th>Total equipo</th>
                                                    <th>Equipo</th>
                                                    <th>Colaborador</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
                                                    <td>---</td>	
                                                    <td>---</td>	
                                                    <td>---</td>							
													<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal3">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>
												</tr>
												<tr>
													<td>2</td>	
                                                    <td>---</td>
                                                    <td>---</td>
                                                    <td>---</td>
													<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal3">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>
												</tr>
												<tr>
													<td>3</td>
                                                    <td>---</td>
                                                    <td>---</td>
                                                    <td>---</td>
													<td><button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Modal3">Modificar</button></td>
													<td><button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Deshabilitar</button></td>	
												</tr>
											</tbody>
										</table>
									</div>
                                </div>
                                <!--FIN TABLA 3-->

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
			<h5 class="modal-title" id="ModalTipoEquipo">Datos tipo equipo</h5>
			<button type="submit" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="POST" id="modificar-tipoequipo" >
							<div class="form-row">
									<div class="form-group col-md-12">
											<label for="TipoEquipo">Tipo equipo</label>
											<input type="text" class="form-control" id="TipoEquipo" aria-describedby="puestoHelp" placeholder="Tipo equipo...">
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
	</div>  
	<!--Fin del modal 1-->

	<!-- Modal 2-->
<div class="modal fade bd-modificar-modal-xl" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ModalEquipo">Datos equipo</h5>
				<button type="submit" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
						<form method="POST" id="modificar-equipo">		
								<div class="form-row">
										<div class="form-group col-md-12">
												<label for="Equipo">Equipo</label>
												<input type="text" class="form-control" id="Equipo" aria-describedby="areaHelp" placeholder="Equipo...">
												<small id="areaHelp" class="form-text text-muted"></small>
										</div>
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
				<button type="submit" class="btn btn-primary" data-dismiss="modal">Modficar</button>
			</div>
			</div>
		</div> 
		 <!--Fin del modal 2-->

        <!--Inicio del modal 3-->
        <div class="modal fade bd-modificar-modal-xl" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTotalEquipo">Datos total equipo</h5>
                    <button type="submit" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                            <form method="POST" id="modificar-totalequipo">
                                    <div class="form-row">
                                            <div class="form-group col-md-12">
                                                    <label for="Totalequipo">Total equipo</label>
                                                    <input type="text" class="form-control" id="Totalequipo" aria-describedby="puestoHelp" placeholder="total equipo...">
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
            </div> 
        <!--Fin del modal 3-->

		<!--Modal Deshabilitar-->

	<!-- Button trigger modal -->

	
	<!-- Inicio Modal deshabilitar -->
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

	<!-- Inicio Modal insertar Tipo equipo-->
	<div class="modal fade bd-modificar-modal-xl" id="tipoequipo-insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos de Tipo Equipo</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="insertar-Tipoequipo">
							<div class="form-group col-md-12">
									<label for="TipoEquipo">Tipo Equipo</label>
									<input type="text" class="form-control" id="TipoEquipo" aria-describedby="tipoequipoHelp" placeholder="Tipo equipo">
									<small id="tipoequipoHelp" class="form-text text-muted"></small>
							</div>
						</form>
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" data-dismiss="modal">Modficar</button>
		</div>
		</div>
	</div>  <!--Fin del modal Insertar tipo equipo-->


	<!-- Inicio Modal insertar Equipo-->
	<div class="modal fade bd-modificar-modal-xl" id="equipoInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos de Equipo</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="insertar-equipo">
							<div class="form-group col-md-12">
									<label for="Equipo">Equipo</label>
									<input type="text" class="form-control" id="Equipo" aria-describedby="equipoHelp" placeholder="Equipo">
									<small id="equipoHelp" class="form-text text-muted"></small>
							</div>
						</form>
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" data-dismiss="modal">Modficar</button>
		</div>
		</div>
	</div>  <!--Fin del modal Insertar equipo-->

	<!-- Inicio Modal insertar Total equipo-->
	<div class="modal fade bd-modificar-modal-xl" id="totalequipo-insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalScrollableTitle">Datos de Total equipo</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="insertar-totalEquipo">
							<div class="form-group col-md-12">
									<label for="Total equipo">Total Equipo</label>
									<input type="text" class="form-control" id="totalEquipo" aria-describedby="totalequiponHelp" placeholder="Total equipo">
									<small id="totalequipoHelp" class="form-text text-muted"></small>
							</div>
						</form>
					</div>											
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" data-dismiss="modal">Modficar</button>
		</div>
		</div>
	</div>  <!--Fin del modal Insertar total equipo-->

	<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->

	<script src="../Backend/core/helpers/validator.js"></script>
	<script src="../Backend/core/helpers/components.js"></script>
	<script src="../Backend/core/controllers/Religion.js"></script>	
</body>
</html>