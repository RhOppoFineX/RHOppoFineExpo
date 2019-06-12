<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-idioma </title>
	
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
							<h3 class="page-title">Datos de idioma</h3>
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
                                                    <th>idioma</th>
                                                    <th>Nivel</th>
												</tr>
											</thead>
											<tbody id="tabla-idioma">
												
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
<div class="modal fade bd-modificar-modal-xl" id="idiomaModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
					<form method="post" id="modificaridioma">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="idioma">idioma</label>
                                <input type="Text" class="form-control" id="idioma" placeholder="idioma" name="idioma">
                            </div>
							<div class="form-group col-md-4">
                                <label for="nivel">Tipo idioma</label>
                                <select id="nivel" class="form-control" name="nivel">
                                        
                                </select>                               
                            </div>
				<!--Input invisible-->		<input type="hidden" id="Id_idioma" name="Id_idioma">
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
    </div>  <!--Fin del modal modificar idioma-->


	<!-- Modal agregar idioma-->
<div class="modal fade bd-modificar-modal-xl" id="idiomaAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
						<form method="post" id="agregaridioma">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="Idioma-A">Idioma</label>
									<input type="Text" class="form-control" id="Idioma-A" placeholder="Idioma" name="Idioma-A">
								</div>
								<div class="form-group col-md-4">
									<label for="Nivel-A">Tipo de Nivel</label>
									<select id="Nivel-A" name="Nivel-A" class="form-control">
									</select>									
									
								</div>						
							</div>
						</div>                            					
				</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Agregar</button>
			</form>			
		</div>	
	</div>
</div>  <!--Fin del modal agregar idioma-->


<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->

	<script src="../Backend/libraries/sweetalert.min.js"></script><!--Libreria para los mensajes de confirmacion-->
	<script src="../Backend/core/helpers/validator.js"></script>
	<script src="../Backend/core/helpers/components.js"></script>
	<script src="../Backend/core/controllers/idioma.js"></script>	
	<!--Los primeros Tres scripts siempre son los mismos el que cambia son los controladores-->

	
</body>
</html>

