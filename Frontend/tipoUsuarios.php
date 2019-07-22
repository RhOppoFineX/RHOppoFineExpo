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
							<h3 class="page-title">Tipos de usuarios</h3>
							<div class="col-md-12">
                                <!-- TABLE STRIPED -->                            

                                <div class="panel">
									<div class="panel-heading">										
										<!--Boton Agregar--->												
										<a type="button" class="btn btn-primary btn-lg" onclick="modalCreate()">Agregar nuevo registro <span class="lnr lnr-file-add"></span></a>
									</div>
									<div class="panel-body no-padding">
										<table class="table table-striped" id="TablaDetUsuario">
											<thead>
												<tr>
													<th>#</th>
													<th>Tipo usuario</th>
												</tr>
											</thead>
											<tbody id="tabla-tipo-usuario">
												
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
    
    <!-- Modal modificar Tipo Usuario-->
    <div class="modal fade bd-modificar-modal-xl" id="modal-modificar-tipoUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalElmo">Detalle de Tipo Usuario</h5>
                <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                        <form method="post" id="modificar-tipoUsuario">
                            <div class="form-row">
                                <div class="form-group col-md-12">
									<!--Invisible--><input type="hidden" id="Id-tipo-usuario" name="Id-tipo-usuario">	
                                    <label for="tipo-usuario">Tipo usuario</label>
                                    <input type="text" class="form-control" id="tipo-usuario" aria-describedby="tipoHelp" placeholder="Tipo usuario" name="tipo-usuario">
                                    <small id="tipoHelp" class="form-text text-muted"></small>
                                </div>
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
	<!--Fin Modal modificar Tipo Usuario-->
	
	 <!-- Modal agregar Tipo Usuario-->
	 <div class="modal fade bd-modificar-modal-xl" id="modal-agregar-tipoUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalElmo">Detalle de Tipo Usuario</h5>
                <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                        <form method="post" id="agregar-TipoUsuario">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="exampleInputTipo1">Tipo usuario</label>
                                    <input type="text" class="form-control" id="tipo-usuario-a" aria-describedby="tipoHelp" placeholder="Tipo usuario" name="tipo-usuario-a">
                                    <small id="tipoHelp" class="form-text text-muted"></small>
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
    </div> 
    <!--Fin Modal agregar Tipo Usuario-->


	<!--Scripts necesarios siempre-->
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