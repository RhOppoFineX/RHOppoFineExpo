<!doctype html>
<html lang="es" class="fullscreen-bg">

<head>
	<title>Login | Recursos Humanos ITR</title>
	
	<?php
		require_once '../backend/core/helpers/css.php';	//Hojas de estilos CSS
	?>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/logo-ricaldone.png" alt="Klorofil Logo" width="210" height="90" class="img-responsive"></div>
								<p class="lead">Ingresa tu cuenta</p>
							</div>
							<form class="" method="post" id="form-login"> <!---action="index.php"--->
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="signin-email" placeholder="Email" name="signin-email">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" placeholder="Password" name="signin-password">
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Recordar Contraseña</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Inciar sesión</button>
								<div class="submit">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">¿Olvidastes tu Contraseña?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Instituto Tecnico Ricaldone</h1>
							<p>Recursos Humanos</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->


	<!--Scripts necesarios siempre-->
	<?php
		require_once '../Backend/core/helpers/scripts.php';
	?>
	<!--Scripts para los cruds-->
	<script src="../Backend/libraries/sweetalert.min.js"></script>
	<script src="../Backend/core/helpers/validator.js"></script>
	<script src="../Backend/core/helpers/components.js"></script>
	<script src="../Backend/core/controllers/Index.js"></script>	
</body>

</html>
