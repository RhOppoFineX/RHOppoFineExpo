<?php
class Municipio extends Validator
{
	// Declaración de propiedades
	private $id = null;
    private $municipio = null;
	//LLAVE FORANEA
	private $Id_departamento = null;

	//Metodos set y get de llave foranea
	public function setId_departamento($value)
	{
		if($this->validateId($value)){
			$this->Id_departamento = $value;
			return true;
		}else{
			return false;
		}
	}

	public function getId_departamento()
	{
		return $this->id_departamento;
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

	public function setmunicipio($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) { 
			$this->municipio = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getmunicipio()
	{
		return $this->municipio;
	}

	// Metodos para manejar el SCRUD
	public function readmunicipio()
	{
		$sql = 'SELECT Id_municipio, Municipio, D.Departamento AS Departamento FROM Municipio AS M INNER JOIN Departamento AS D ON M.Id_departamento = D.Id_departamento ORDER BY Id_municipio';
		$params = array(null);	
		return Database::getRows($sql, $params);
	}

    public function createmunicipio()
	{
		$sql = 'INSERT INTO municipio(Municipio, Id_departamento) VALUES(?, ?)';
		$params = array($this->municipio, $this->Id_departamento);
		return Database::executeRow($sql, $params);
	}
	//para el modal modificar recuerden
	public function getmunicipioModal()
	{
		$sql = 'SELECT Id_municipio, Municipio, Id_departamento FROM Municipio WHERE Id_municipio = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updatemunicipio()
	{
		$sql = 'UPDATE Municipio SET Municipio = ?, Id_departamento = ? WHERE Id_municipio = ?';
		$params = array($this->municipio, $this->Id_departamento, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deletemunicipio()
	{
		$sql = 'DELETE FROM Municipio WHERE Id_municipio = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>