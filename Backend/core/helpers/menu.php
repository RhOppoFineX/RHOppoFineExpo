<!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
					<div class="brand">
						<a href="index.php"><img src="assets/img/logo-ricaldone.png" alt="Klorofil Logo" class="img-responsive logo" width="100px" height="100px"></a>
					</div>
					<div class="container-fluid">
						<div class="navbar-btn">
							<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
						</div>
						<form class="navbar-form navbar-left">
							<div class="input-group">
								<input type="text" value="" class="form-control" placeholder="Buscar Colaborador">
								<span class="input-group-btn"><button type="button" class="btn btn-warning">Go</button></span>
							</div>
						</form>
						<!-- <div class="navbar-btn navbar-btn-right">
							<a class="btn btn-success update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</div> -->
						<div id="navbar-menu">
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
										 Notificaciones
										<i class="lnr lnr-alarm"></i>
										<span class="badge bg-danger">5</span>
									</a>
									<ul class="dropdown-menu notifications">
										<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>5 Colaboradores añadidos</a></li>
										<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>2 Personas necesitan renovar Dui</a></li>
										<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Estamos Bien</a></li>
										<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
										<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
										<li><a href="#" class="more">Ver más Notificaiones</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Estado del Colaborador</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#">Activo</a></li>
										<li><a href="#">Inactivo</a></li>	
										<li><a href="#">Permanente</a></li>									
									</ul>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-graduation-hat"></i> <span>Servicios Profesionales(Colegio)</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#"><i class="lnr"></i> <span>Pilet</span></a></li>
										<li><a href="#"><i class="lnr"></i> <span>Cursos Libres de Natacion</span></a></li>
										<li><a href="#"><i class="lnr"></i> <span>Cursos de nivelación</span></a></li>
										<li><a href="#"><i class="lnr"></i> <span>Interinatos</span></a></li>
										<li><a href="#"><i class="lnr"></i> <span>Otros Servicios</span></a></li>
									</ul>
								</li>
								<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-license"></i> <span>Tu Perfil</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
										<ul class="dropdown-menu">
											<li><a href="#" onclick="modalProfile()"><i class="lnr"></i> <span>Editar perfil</span></a></li>
											
											<li><a href="#"data-toggle="modal" data-target="#perfil-pass"><i class="lnr"></i> <span>Cambiar clave</span></a></li>

											<li><a href="#" onclick="signOff()"><i class="lnr"></i> <span>Salir</span></a></li>
										</ul>
								</li>
								<!-- <li>
									<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
								</li> -->
							</ul>
						</div>
					</div>
				</nav>
				<!-- END NAVBAR -->
				
				<!-- LEFT SIDEBAR -->
                <div id="sidebar-nav" class="sidebar">
					<div class="sidebar-scroll">
						<nav><!--Principal-->
							<ul class="nav">
								<li><a href="index.php" class="active"><i class="lnr lnr-home"></i> <span>Principal</span></a></li>
							<!--Cruds-->
							<li>
									<a href="#subPagesCruds" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Datos Colaborador</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
									<div id="subPagesCruds" class="collapse ">
										<ul class="nav"><!--Colaborador-->
											<li><a href="datos-colaborador.php" class=""><i class="lnr lnr-dice"></i> <span>Datos Personales</span></a></li>
											<li><a href="datos-identificacion.php" class=""><i class="lnr lnr-dice"></i> <span>Identificación</span></a></li>
											<li><a href="datos-familiares.php" class=""><i class="lnr lnr-dice"></i> <span>Familiares</span></a></li>
											<li><a href="datos-educacion.php" class=""><i class="lnr lnr-dice"></i> <span>Educación</span></a></li>
											<li><a href="tables.php" class=""><i class="lnr lnr-dice"></i> <span>Más Conocimientos</span></a></li>	
											<li><a href="tables.php" class=""><i class="lnr lnr-dice"></i> <span>Experiencia Laboral</span></a></li>
											<li><a href="tables.php" class=""><i class="lnr lnr-dice"></i> <span>Salud</span></a></li>
											<li><a href="tables.php" class=""><i class="lnr lnr-dice"></i> <span>Area Laboral</span></a></li>
											<li><a href="tables.php" class=""><i class="lnr lnr-dice"></i> <span>Horarios</span></a></li>										
											</ul><!--Colaborador-->
										</div>
								</li><!--/Cruds-->
								<li>
									<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Mantenimientos</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
									<div id="subPages" class="collapse ">
										<ul class="nav">
											<li><a href="tipoUsuarios.php" class=""> Tipos de Usuarios</a></li>
											<li><a href="usuarios.php" class="">Usuarios</a></li>
											<li><a href="area.php" class="">Area</a></li>											
											<li><a href="puesto.php" class="">Puesto</a></li>
											<li><a href="nacionalidad.php" class="">Nacionalidad</a></li>
											<li><a href="nivel-idioma.php" class=""> Nivel Idioma</a></li>
											<li><a href="idioma.php" class="">Idioma</a></li>
											<li><a href="tipo-equipo.php" class="">Tipo Equipo</a></li>
											<li><a href="equipo.php" class="">Equipo</a></li>
											<li><a href="departamento.php" class="">Departamento</a></li>
											<li><a href="municipio.php" class="">Municipio</a></li>
											<li><a href="estado-civil.php" class="">Estado civil</a></li>
                                            <li><a href="religion.php" class="">Religión</a></li>                                     
											<li><a href="categoria-educacion.php" class="">Categoria educación</a></li>
											<li><a href="parentesco.php" class="">Parentesco</a></li>
											<li><a href="educacion.php" class="">Información Educación</a></li>	
										</ul>
									</div>
								</li>									
								<li><a href="elements.php" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li>
								<li><a href="charts.php" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
								<li><a href="panels.php" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
								<li><a href="notifications.php" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>					
								<li><a href="tables.php" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
								<li><a href="typography.php" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
								<li><a href="icons.php" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
							</ul>
						</nav>
					</div>
				</div>
    

