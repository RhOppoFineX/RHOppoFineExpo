<?php
class Departamento extends Validator
{
	// Declaración de propiedades
	private $id = null;
    private $departamento = null;
	//LLAVE FORANEA
	private $Id_nacionalidad = null;

	//Metodos set y get de llave foranea
	public function setId_nacionalidad($value)
	{
		if($this->validateId($value)){
			$this->Id_nacionalidad = $value;
			return true;
		}else{
			return false;
		}
	}

	public function getId_nacionalidad()
	{
		return $this->id_nacionalidad;
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

	public function setdepartamento($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {  
			$this->departamento = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getdepartamento()             
	{
		return $this->departamento;
	}

	// Metodos para manejar el SCRUD
	public function readdepartamento()
	{
		$sql = 'SELECT Id_departamento, Departamento, N.Nacionalidad AS Nacionalidad FROM Departamento AS D INNER JOIN Nacionalidad AS N ON D.Id_nacionalidad = N.Id_nacionalidad ORDER BY Id_departamento';
		$params = array(null);	
		return Database::getRows($sql, $params);
	}

    public function createdepartamento()
	{
		$sql = 'INSERT INTO departamento(Departamento, id_nacionalidad) VALUES(?, ?)';
		$params = array($this->departamento, $this->Id_nacionalidad);
		return Database::executeRow($sql, $params);
	}
	//para el modal modificar recuerden
	public function getdepartamentoModal()
	{
		$sql = 'SELECT Id_departamento, Departamento, Id_nacionalidad FROM Departamento WHERE Id_departamento = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updatedepartamento()
	{
		$sql = 'UPDATE Departamento SET Departamento = ?, Id_nacionalidad = ? WHERE Id_departamento = ?';
		$params = array($this->departamento, $this->Id_nacionalidad, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deletedepartamento()
	{
		$sql = 'DELETE FROM Departamento WHERE Id_departamento = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>