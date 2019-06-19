<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>Tabla | Datos-Usuarios </title>
	
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
							<h3 class="page-title">Datos de los usuarios</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->
                                <div class="panel">
									<div class="panel-heading">
										<!--Boton Agregar-->												
										<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>										
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped" id="TablaUsuario">
											<thead>
												<tr>													
                                                    <th>Nombres</th>
                                                    <th>Apellidos</th>
                                                    <th>Correo</th>
													<th>Tipo usuario</th>
													<th>User Name</th>
												</tr>
											</thead>
											<tbody id="tabla-usuario">
												
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

<!-- Modal Modificar usuarios-->
<div class="modal fade bd-modificar-modal-xl" id="usuarioModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Datos de los Usuarios</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
					<form method="post" id="modificarUsuario">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nombres">Nombres</label>
                                <input type="Text" class="form-control" id="Nombres" placeholder="Nombres" name="Nombres">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Apellidos">Apellidos</label>
                                <input type="Text" class="form-control" id="Apellidos" placeholder="Apellidos" name="Apellidos">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="Correo">Correo electonico</label>
                                <input type="email" class="form-control" id="Correo" aria-describedby="emailHelp" placeholder="Correo Institucional" name="Correo">
                                <small id="emailHelp" class="form-text text-muted"></small>
							</div>

							<div class="form-group col-md-3">
                                <label for="userName">User Name</label>
                                <input type="text" class="form-control" id="userName" aria-describedby="emailHelp" placeholder="userName Institucional" name="userName">
                                <small id="emailHelp" class="form-text text-muted"></small>
							</div>
							
							<div class="form-group col-md-4">
                                <label for="Tipos">Tipo usuario</label>
                                <select id="Tipos" class="form-control" name="Tipos">
                                        
                                </select>									
                                
                            </div>
				<!--Input invisible--><input type="hidden" id="Id_usuario" name="Id_usuario">
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
    </div>  <!--Fin del modal modificar usuarios-->


	<!-- Modal agregar usuarios-->
<div class="modal fade bd-modificar-modal-xl" id="usuarioAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="ModalTitulo">Datos de los Usuarios</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
			<div class="modal-body">
					<div class="container-fluid">
						<form method="post" id="agregarUsuario">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="Nombres-A">Nombres-A</label>
									<input type="Text" class="form-control" id="Nombres-A" placeholder="Nombres-A" name="Nombres-A">
								</div>
								<div class="form-group col-md-6">
									<label for="Apellidos-A">Apellidos-A</label>
									<input type="Text" class="form-control" id="Apellidos-A" placeholder="Apellidos-A" name="Apellidos-A">
								</div>
								<div class="form-group col-md-8">
									<label for="Correo-A">Correo electonico</label>
									<input type="email" class="form-control" id="Correo-A" aria-describedby="emailHelp" placeholder="Correo Institucional" name="Correo-A">
									<small id="emailHelp" class="form-text text-muted"></small>
								</div>
	
								<div class="form-group col-md-4">
									<label for="userName-A">User Name</label>
									<input type="text" class="form-control" id="userName-A" aria-describedby="emailHelp" placeholder="userName Institucional" name="userName-A">
									<small id="emailHelp" class="form-text text-muted"></small>
								</div>
	
								<div class="form-group col-md-4">
									<label for="Contraseña-A">Contraseña</label>
									<input type="password" class="form-control" id="Contraseña-A" aria-describedby="emailHelp" placeholder="Contraseña Institucional" name="Contraseña-A">
									<small id="emailHelp" class="form-text text-muted"></small>
								</div>
	
								<div class="form-group col-md-4">
									<label for="ContraseñaDos-A">Repetir Contraseña</label>
									<input type="password" class="form-control" id="ContraseñaDos-A" aria-describedby="emailHelp" placeholder="ContraseñaDos Institucional" name="ContraseñaDos-A">
									<small id="emailHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-4">
									<label for="Tipos-A">Tipo usuario</label>
									<select id="Tipos-A" name="Tipos-A" class="form-control">
									
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
</div>  <!--Fin del modal agregar usuarios-->

<!--Modals para editar perfil-->
<?php
	require_once '../Backend/core/helpers/perfil.php';
?>

<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->	
	<script src="../Backend/core/controllers/usuarios.js"></script>	<!--Solo dejar el script del controlador-->
	<!--Los primeros scripts siempre son los mismos el que cambia es el controlador-->
	
</body>
</html>

