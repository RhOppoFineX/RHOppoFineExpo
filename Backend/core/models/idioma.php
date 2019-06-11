<?php
class idioma extends Validator
{
	// Declaración de propiedades
	private $id = null;
    private $idioma = null;
    private $nivel = null;
	//LLAVE FORANEA
	private $Id_nivel_idioma = null;

	//Metodos set y get de llave foranea
	public function setId_nivel_idioma($value)
	{
		if($this->validateId($value)){
			$this->id_nivel_idioma = $value;
			return true;
		}else{
			return false;
		}
	}

	public function getId_nivel_idioma()
	{
		return $this->id_nivel_idioma;
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

	public function setidioma($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->idioma = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getidioma()
	{
		return $this->idioma;
	}

	public function setnivel($value)
	{
		if ($this->validateId($value)) {
			$this->nivel = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getnivel()
	{
		return $this->nivel;
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

	// Metodos para manejar el SCRUD
	public function readidioma()
	{
		$sql = 'SELECT Id_idioma, Idioma, N.Nivel as Nivel FROM idioma as I INNER JOIN nivel_idioma as N ON I.Id_nivel_idioma = N.Id_nivel_idioma ORDER BY Id_idioma';
		$params = array(null);	
		return Database::getRows($sql, $params);
	}

    public function createidioma()
	{
		$sql = 'INSERT INTO idioma(Idioma,id_nivel_idioma) VALUES(?, ?)';
		$params = array($this->idioma, $this->nivel);
		return Database::executeRow($sql, $params);
	}
	//para el modal modificar recuerden
	public function getidiomaModal()
	{
		$sql = 'SELECT Id_idioma, Idioma, N.Nivel FROM idioma as I INNER JOIN Id_nivel_idioma as N ON I.Id_Id_nivel_idioma = N.Id_nivel_idioma WHERE Id_idioma = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateUsuario()
	{
		$sql = 'UPDATE idioma SET Idioma = ?, Id_nivel_idioma = ? WHERE Id_idioma = ?';
		$params = array($this->idioma, $this->id_nivel_idioma,$this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteUsuario()
	{
		$sql = 'DELETE FROM Idioma WHERE Id_idioma = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
