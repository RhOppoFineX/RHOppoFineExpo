<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>Tabla | Datos-Equipo </title>
	
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
							<h3 class="page-title">Datos equipo total</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
                                <div class="panel">
									<div class="panel-heading">
										<!--<h3 class="panel-title">Datos parentesco</h3>-->
								<!--Boton insertar--><a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped" id="tabla-equipo">
											<thead>
												<tr>
                                                    <th>Nombre equipo</th>
                                                    <th>Tipo equipo</th>
												</tr>
											</thead>
											<tbody id="tbody-read">
											
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

			<!--Inicio Modal Modificar-->
			<div class="modal fade bd-modificar-modal-xl" id="equipoModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Datos de Tipo equipo</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="modificarEquipo" autocomplete="off" re>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nombre-equipo">Nombre equipo</label>
                                <input type="Text" class="form-control" id="Nombre-equipo" placeholder="Nombres" name="Nombre-equipo" required>
                            </div>
							
							<div class="form-group col-md-6">
                                <label for="Tipo-equipo">Tipo equipo</label>
                                <select id="Tipo-equipo" class="form-control" name="Tipo-equipo" required>
                                </select>									 
                            </div>
				<!--Input invisible--><input type="hidden" id="Id_equipo" name="Id_equipo">
                        </div>                            
				</div>					
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Modficar</button>
			</form>	
		</div>
		</div>
    </div>		
 	<!--Fin del modal modificar-->

		<!--Inicio Modal Insertar-->
		<div class="modal fade bd-modificar-modal-xl" id="equipoAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Datos de Tipo equipo</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="agregarEquipo" autocomplete="off">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="Nombre-equipo-A">Nombre equipo</label>
									<input type="Text" class="form-control" id="Nombre-equipo-A" placeholder="Nombre-equipo-A" name="Nombre-equipo-A" required>
								</div>
								
								<div class="form-group col-md-6">
									<label for="Tipo-equipo-A">Tipo equipo</label>
									<select id="Tipo-equipo-A" name="Tipo-equipo-A" class="form-control" required>
									
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
</div> 
 	 	<!--Fin del modal Insertar-->
	
	<!--Modals para editar perfil-->
	<?php
	require_once '../Backend/core/helpers/perfil.php';
	?>

	<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>

	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/equipo.js"></script>
		
	</body>
</html>