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
			$this->Id_nivel_idioma = $value;
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
		$params = array($this->idioma, $this->Id_nivel_idioma);
		return Database::executeRow($sql, $params);
	}
	//para el modal modificar recuerden
	public function getidiomaModal()
	{
		$sql = 'SELECT Id_idioma, Idioma, Id_nivel_idioma FROM idioma WHERE Id_idioma = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateidioma()
	{
		$sql = 'UPDATE Idioma SET Idioma = ?, Id_nivel_idioma = ? WHERE Id_idioma = ?';
		$params = array($this->idioma, $this->Id_nivel_idioma, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteidioma()
	{
		$sql = 'DELETE FROM Idioma WHERE Id_idioma = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>
