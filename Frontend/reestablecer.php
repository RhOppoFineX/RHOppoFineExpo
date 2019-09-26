<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Reestablecer </title>

    <?php
		require_once '../backend/core/helpers/css.php';	//Hojas de estilos CSS
    ?>
  
</head>
<body>
	<?php
		//Control de Sesión		
		// require_once '../backend/core/helpers/sesion.php';
		// Session::iniSession();
		// $_SESSION['Tipo_usuario_privilegios'] = ['Administrador', 'Colaborador', 'Enfermeria'];
	?>

	<!--Wrapper-->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">					
					<div class="content">					
							<form method="post" id="reset-usuario" autocomplete="on">								
										
										<div class="form-group col-md-12">
											<label for="Correo">Correo electonico</label>
											<input type="email" class="form-control" id="Correo" aria-describedby="emailHelp" placeholder="Correo Institucional" name="Correo" required>
											<small id="emailHelp" class="form-text text-muted"></small>
										</div>								

									<div class="container-fluid">
										<div class="row align-items-center">
											<div class="col text-center">
												<button type="submit" class="btn btn-primary btn-lg">Enviar</button>						
											</div>
										</div>
									</div>
							</form>	
					</div>
					
				</div>	
			</div>		
		</div>			
</div>
<!-- END WRAPPER -->

<!-- modal reset password-->
<div class="modal fade bd-modificar-modal-xl" id="modal-reset-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
					<form method="post" id="form-reset-password" autocomplete="off">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="Token">Ingrese el codigo que ha sido enviado a su correo</label>
                                <input type="Text" class="form-control" id="Token" placeholder="Token" name="Token" required>
                            </div>
                            
				<!--Input invisible--><input type="hidden" id="Correo_token" name="Correo_token">
                        </div>                            
				</div>					
			</div>			  
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary">Verifcar</button>
			</form>	
		</div>
		</div>
    </div>  <!--Fin del modal reset password-->


    <!--Modal modificar password-->

<div class="modal fade bd-modificar-modal-xl" id="modal-reset-password-token" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
					<form method="post" id="form-reset-password-token">
                        <div class="form-row">							

							<div class="form-group col-md-6">
								<label for="clave_nueva_1">Nueva Contraseña</label>
								<input type="password" class="form-control" id="clave_nueva_1" aria-describedby="emailHelp" placeholder="Nueva Contraseña Institucional" name="clave_nueva_1" required>
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>

							<div class="form-group col-md-6">
								<label for="clave_nueva_2">Confirmar Contraseña</label>
								<input type="password" class="form-control" id="clave_nueva_2" aria-describedby="emailHelp" placeholder="Confirmar Institucional" name="clave_nueva_2" required>
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>	

                            <!--Input invisible--><input type="hidden" id="Correo_verificado" name="Correo_verificado">							
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
            
          <!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>	
    
</body>
</html>
