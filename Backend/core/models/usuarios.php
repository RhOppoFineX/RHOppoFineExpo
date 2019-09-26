<?php
class Usuarios extends Validator
{
	// Declaración de propiedades
	private $id = null;
	private $nombres = null;
	private $apellidos = null;
	private $correo = null;
	private $alias = null;
	private $clave = null;
	//LLAVE FORANEA
	private $id_tipo_usuario = null;
	private $Intentos = null;
	private $Estado = null;
	private $Tipo_usuario = null;
	private $actividad = null;
	private $Fecha = null;
	private $Token = null;

	
	/**
	 * Get the value of Token
	 */ 
	public function getToken()
	{
		return $this->Token;
	}

	/**
	 * Set the value of Token
	 *
	 * @return  self
	 */ 
	public function setToken($Token)
	{
		if($this->validateAlphanumeric($Token, 4, 50)){
			$this->Token = $Token;
			return true;
		} else {
			return false;
		}		
	}

	/**
	 * Get the value of Fecha
	 */ 
	public function getFecha()
	{
		return $this->Fecha;
	}

	/**
	 * Set the value of Fecha
	 *
	 * @return  self
	 */ 
	public function setFecha($Fecha)
	{
		if($this->validateDate($Fecha)){
			$this->Fecha = $Fecha;
			return true;
		} else {
			return false;
		}	
	}

	/**
	 * Get the value of Actividad
	 */ 
	public function getActividad()
	{
		return $this->Actividad;
	}

	/**
	 * Set the value of Actividad
	 *
	 * @return  self
	 */ 
	public function setActividad($Actividad)
	{
		if($this->validateInteger($Actividad)){
			$this->actividad = $Actividad;
			return true;
		} else {
			return false;
		}		
	}

	public function setTipo_usuario($value)
	{
		if(validateAlphabetic($value, 1, 20)){
			$this->Tipo_usuario = $value;
			return true;
		} else {
			return false;
		}

	}

	public function getTipo_usuario()
	{
		return $this->Tipo_usuario;
	}

	//Metodos set y get de llave foranea
	public function setId_tipo_usuario($value)
	{
		if($this->validateId($value)){
			$this->id_tipo_usuario = $value;
			return true;
		}else{
			return false;
		}
	}

	public function getId_tipo_usuario()
	{
		return $this->id_tipo_usuario;
	}

	// Métodos para sobrecarga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNombres($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->nombres = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombres()
	{
		return $this->nombres;
	}

	public function setApellidos($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->apellidos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function setCorreo($value)
	{
		if ($this->validateEmail($value)) {
			$this->correo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function setAlias($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->alias = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getAlias()
	{
		return $this->alias;
	}

	public function setClave($value)
	{
		if ($this->validatePassword($value)) {
			$this->clave = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getClave()
	{
		return $this->clave;
	}

	public function setIntentos($value)
	{
		if($this->validateInteger($value)) {
			$this->Intentos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIntentos()
	{
		return $this->Intentos;
	}
	
	public function setEstado($value)
	{
		if($this->validateInteger($value)) {
			$this->Estado = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getEstado()
	{
		return $this->Estado;
	}

	// Métodos para manejar la sesión del usuario
	//este metodo no
	public function checkEmail()
	{
		$sql = 'SELECT Id_usuario, T.Tipo_usuario, Nombres_usuario, Apellidos_usuario FROM Usuario as U INNER JOIN Tipo_usuario as T ON U.Id_tipo_usuario = T.Id_tipo_usuario WHERE Correo_usuario = ? and U.Estado = 1 and Intentos < 5';
		$params = array($this->correo);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->id = $data['Id_usuario'];
			$this->Tipo_usuario = $data['Tipo_usuario'];
			$this->nombres = $data['Nombres_usuario'];
			$this->apellidos = $data['Apellidos_usuario'];
			return true;
		} else {
			return false;
		}
	}
	//este metodo no
	public function checkPassword()
	{
		$sql = 'SELECT Clave_usuario FROM Usuario WHERE Id_usuario = ? and Estado = 1 and Intentos < 5';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);
		if (password_verify($this->clave, $data['Clave_usuario'])) {
			return true;
		} else {
			$this->verIntentos();
			return false;
		}
	}
	//este metodo no
	public function changePassword()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'UPDATE Usuario SET Clave_usuario = ? WHERE Id_usuario = ? and Estado = 1';
		$params = array($hash, $this->id);
		return Database::executeRow($sql, $params);
	}

	// Metodos para manejar el SCRUD
	public function readUsuarios()
	{
		$sql = 'SELECT Id_usuario, Nombres_usuario, Apellidos_usuario, Correo_usuario, Alias_usuario, T.Tipo_usuario FROM Usuario as U INNER JOIN Tipo_usuario as T ON U.Id_tipo_usuario = T.Id_tipo_usuario WHERE U.Estado = 1 ORDER BY Apellidos_usuario';
		$params = array(null);	
		return Database::getRows($sql, $params);
	}
	//este metodo de buscar no lo ocuparemos
	public function searchUsuarios($value)
	{
		$sql = 'SELECT Id_usuario, Nombres_usuario, Apellidos_usuario, Correo_usuario, Alias_usuario FROM Usuario WHERE Apellidos_usuario LIKE ? OR Nombres_usuario LIKE ? ORDER BY Apellidos_usuario';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createUsuario()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);//No poner esta linea
		$sql = 'INSERT INTO Usuario(Nombres_usuario, Apellidos_usuario, Correo_usuario, Alias_usuario, Clave_usuario, Id_tipo_usuario, Fecha) VALUES(?, ?, ?, ?, ?, ?, CURDATE())';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $hash, $this->id_tipo_usuario);
		return Database::executeRow($sql, $params);
	}
	//para el modal modificar recuerden
	public function getUsuario()
	{
		$sql = 'SELECT Id_usuario, Nombres_usuario, Apellidos_usuario, Correo_usuario, Alias_usuario, Id_tipo_usuario FROM Usuario WHERE Id_usuario = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateUsuario()
	{
		$sql = 'UPDATE Usuario SET Nombres_usuario = ?, Apellidos_usuario = ?, Correo_usuario = ?, Alias_usuario = ?, Id_tipo_usuario = ? WHERE Id_usuario = ?';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->id_tipo_usuario,$this->id);
		return Database::executeRow($sql, $params);
	}

	public function updateUsuarioPropio()
	{
		$sql = 'UPDATE Usuario SET Nombres_usuario = ?, Apellidos_usuario = ?, Correo_usuario = ?, Alias_usuario = ? WHERE Id_usuario = ?';
		$params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteUsuario()
	{
		$sql = 'DELETE FROM Usuario WHERE Id_usuario = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	public function verIntentos()
	{
		$sql = 'SELECT Intentos FROM Usuario WHERE Correo_usuario = ?';
		$params = array($this->correo);
		$data = Database::getRow($sql, $params);
		
		if($data){
			$inten = $data['Intentos'];
			$inten = $inten + 1; 			
			$this->Intentos = $inten;
			$this->aumentarIntentos();
		}
	}

	public function aumentarIntentos()
	{
		$sql = 'UPDATE Usuario SET Intentos = ? WHERE Correo_usuario = ?';
		$params = array($this->Intentos, $this->correo);
		return Database::executeRow($sql, $params);
	}	

	public function disableUsuario()
	{
		$sql = 'UPDATE Usuario SET Estado = ? WHERE Id_usuario = ?';
		$params = array($this->Estado, $this->id);
		return Database::executeRow($sql, $params);		
	}

	public function checkCorreo()
	{
		$sql = 'SELECT Clave_usuario FROM usuario as U WHERE U.Id_usuario = ?';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);

		if(!password_verify($this->correo, $data['Clave_usuario'])){
			return true;
		} else {
			return false;
		}
	}

	public function checkPassForEmail()
	{
		$sql = 'SELECT Correo_usuario FROM usuario as U WHERE U.Id_usuario = ?';
		$params = array($this->id);
		$data = Database::getRow($sql, $params);

		if($this->clave != $data['Correo_usuario']){
			return true;
		} else {
			return false;
		}
	}

	public function checkActividad()
	{
		$sql = 'SELECT (Actividad < 1) as Actividad FROM Usuario WHERE Correo_usuario = ?';
		$params = array($this->correo);
		$data = Database::getRow($sql, $params);

		return $data['Actividad'];

	}

	public function updateActividad()
	{
		$sql = 'UPDATE Usuario set Actividad = ? WHERE Correo_usuario = ?';
		$params = array($this->actividad, $this->correo);
		return Database::executeRow($sql, $params);
	}
	
	public function noventaDias()
	{
		$sql = 'SELECT Fecha FROM Usuario WHERE Id_usuario = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateDate()
	{
		$sql = 'UPDATE Usuario SET Fecha = CURDATE() WHERE Id_usuario = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	public function updateToken()
	{
		$sql = 'UPDATE Usuario SET Token = ? WHERE Correo_usuario = ?';
		$params = array($this->Token, $this->correo);
		return Database::executeRow($sql, $params);
	}

	public function checkToken()
	{
		$sql = 'SELECT Correo_usuario FROM Usuario WHERE Correo_usuario = ? and Token = ?';
		$params = array($this->correo, $this->Token);
		return Database::getRow($sql, $params);
	}
	

}
?>
