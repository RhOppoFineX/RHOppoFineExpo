
<!--Modal modificar propio perfil-->
<div class="modal fade bd-modificar-modal-xl" id="perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
					<form method="post" id="perfil-update">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Nombres-P">Nombres</label>
                                <input type="Text" class="form-control" id="Nombres-P" placeholder="Nombres" name="Nombres-P">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Apellidos-P">Apellidos</label>
                                <input type="Text" class="form-control" id="Apellidos-P" placeholder="Apellidos" name="Apellidos-P">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="Correo-P">Correo electonico</label>
                                <input type="email" class="form-control" id="Correo-P" aria-describedby="emailHelp" placeholder="Correo Institucional" name="Correo-P">
                                <small id="emailHelp" class="form-text text-muted"></small>
							</div>

							<div class="form-group col-md-3">
                                <label for="userName-P">User Name</label>
                                <input type="text" class="form-control" id="userName-P" aria-describedby="emailHelp" placeholder="userName Institucional" name="userName-P">
                                <small id="emailHelp" class="form-text text-muted"></small>
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
<!--Modal modificar propio perfil-->

<!--Modal modificar password-->

<div class="modal fade bd-modificar-modal-xl" id="perfil-pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
					<form method="post" id="pass-update">
                        <div class="form-row">
							<div class="form-group col-md-6">
								<label for="Contraseña-P">Contraseña</label>
								<input type="password" class="form-control" id="Contraseña-P" aria-describedby="emailHelp" placeholder="Contraseña Institucional" name="Contraseña-P">
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>

							<div class="form-group col-md-6">
								<label for="ContraseñaDos-P">Repetir Contraseña</label>
								<input type="password" class="form-control" id="ContraseñaDos-P" aria-describedby="emailHelp" placeholder="Repetir" name="ContraseñaDos-P">
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>

							<div class="form-group col-md-6">
								<label for="Nueva-Contraseña-P">Nueva Contraseña</label>
								<input type="password" class="form-control" id="Nueva-Contraseña-P" aria-describedby="emailHelp" placeholder="Nueva Contraseña Institucional" name="Nueva-Contraseña-P">
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>

							<div class="form-group col-md-6">
								<label for="Confirmar-P">Confirmar Contraseña</label>
								<input type="password" class="form-control" id="Confirmar-P" aria-describedby="emailHelp" placeholder="Confirmar Institucional" name="Confirmar-P">
								<small id="emailHelp" class="form-text text-muted"></small>
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
