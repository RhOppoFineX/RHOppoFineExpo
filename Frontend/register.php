<!DOCTYPE html>
<html lang="en">
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
	<div id="wrapper">

			<div class="container-fluid">
						<form method="post" id="register-usuario">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="Nombres">Nombres</label>
									<input type="Text" class="form-control" id="Nombres" placeholder="Nombres" name="Nombres">
								</div>
								<div class="form-group col-md-6">
									<label for="Apellidos">Apellidos</label>
									<input type="Text" class="form-control" id="Apellidos" placeholder="Apellidos" name="Apellidos">
								</div>
								<div class="form-group col-md-8">
									<label for="Correo">Correo electonico</label>
									<input type="email" class="form-control" id="Correo" aria-describedby="emailHelp" placeholder="Correo Institucional" name="Correo">
									<small id="emailHelp" class="form-text text-muted"></small>
								</div>
	
								<div class="form-group col-md-4">
									<label for="userName">User Name</label>
									<input type="text" class="form-control" id="userName" aria-describedby="emailHelp" placeholder="userName Institucional" name="userName">
									<small id="emailHelp" class="form-text text-muted"></small>
								</div>
	
								<div class="form-group col-md-4">
									<label for="Contraseña">Contraseña</label>
									<input type="password" class="form-control" id="Contraseña" aria-describedby="emailHelp" placeholder="Contraseña Institucional" name="Contraseña">
									<small id="emailHelp" class="form-text text-muted"></small>
								</div>
	
								<div class="form-group col-md-4">
									<label for="ContraseñaDos">Repetir Contraseña</label>
									<input type="password" class="form-control" id="ContraseñaDos" aria-describedby="emailHelp" placeholder="ContraseñaDos Institucional" name="ContraseñaDos">
									<small id="emailHelp" class="form-text text-muted"></small>
								</div>
								<div class="form-group col-md-4">
									<label for="Tipos">Tipo usuario</label>
									<select id="Tipos" name="Tipos" class="form-control">
									
									</select>								
									
								</div>						
							</div>
            </div>
</div>
            
            
          <!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->

	<script src="../Backend/libraries/sweetalert.min.js"></script><!--Libreria para los mensajes de confirmacion-->
	<script src="../Backend/core/helpers/validator.js"></script>
	<script src="../Backend/core/helpers/components.js"></script>
	<script src="../Backend/core/controllers/register.js"></script>	
	<!--Los primeros Tres scripts siempre son los mismos el que cambia son los controladores-->  
    
</body>
</html>
