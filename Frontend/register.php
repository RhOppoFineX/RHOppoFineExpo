<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Registrar </title>

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
							<form method="post" id="register-usuario">								
										<div class="form-group col-md-4">
											<label for="Nombres">Nombres</label>
											<input type="Text" class="form-control" id="Nombres" placeholder="Nombres" name="Nombres" required>
										</div>
										<div class="form-group col-md-4">
											<label for="Apellidos">Apellidos</label>
											<input type="Text" class="form-control" id="Apellidos" placeholder="Apellidos" name="Apellidos" required>
										</div>
										<div class="form-group col-md-4">
											<label for="Correo">Correo electonico</label>
											<input type="email" class="form-control" id="Correo" aria-describedby="emailHelp" placeholder="Correo Institucional" name="Correo" required>
											<small id="emailHelp" class="form-text text-muted"></small>
										</div>
			
										<div class="form-group col-md-4">
											<label for="userName">User Name</label>
											<input type="text" class="form-control" id="userName" aria-describedby="emailHelp" placeholder="userName Institucional" name="userName" required>
											<small id="emailHelp" class="form-text text-muted"></small>
										</div>
			
										<div class="form-group col-md-4">
											<label for="Contraseña">Contraseña</label>
											<input type="password" class="form-control" id="Contraseña" aria-describedby="emailHelp" placeholder="Contraseña Institucional" name="Contraseña" required>
											<small id="emailHelp" class="form-text text-muted"></small>
										</div>
			
										<div class="form-group col-md-4">
											<label for="ContraseñaDos">Repetir Contraseña</label>
											<input type="password" class="form-control" id="ContraseñaDos" aria-describedby="emailHelp" placeholder="ContraseñaDos Institucional" name="ContraseñaDos" required>
											<small id="emailHelp" class="form-text text-muted"></small>
										</div>

									<div class="container-fluid">
										<div class="row align-items-center">
											<div class="col text-center">
												<button type="submit" class="btn btn-primary btn-lg">Registrarse</button>						
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
            
          <!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Script del controlador -->	
	<script src="../Backend/core/controllers/register.js"></script>
    
</body>
</html>
