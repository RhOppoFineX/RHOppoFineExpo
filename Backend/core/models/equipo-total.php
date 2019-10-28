<?php
class Equipo extends Validator
{
	// Declaración de propiedades
	private $Id_equipo = null;
	private $Nombre_equipo = null;
    private $Id_tipo_equipo = null; //llave foranea
    
	//Metodos set y get de llave foranea
	public function setId_tipo_equipo($value)
	{
		if($this->validateId($value)){
			$this->Id_tipo_equipo = $value;
			return true;
		}else{
			return false;
		}
    }
    
    public function getId_tipo_equipo()
	{
		return $this->Id_tipo_equipo;
    }
    
    // Métodos para sobrecarga de propiedades
	public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->Id_equipo = $value;
			return true;
		} else {
			return false;
		}
    }
    
    public function getId()
	{
		return $this->Id_equipo;
    }
    
    public function setNombre_equipo($value)
	{
		if ($this->validateAlphabetic($value, 1, 50)) {
			$this->Nombre_equipo = $value;
			return true;
		} else {
			return false;
		}
    }
    
    public function getNombre_equipo()
	{
		return $this->Nombre_equipo;
    }
    
    // Metodos para manejar el SCRUD
	public function readEquipoTotal()
	{
		$sql = 'SELECT E.Id_equipo_total, T.Nombre_equipo, Codigo_colaborador, Nombres, Apellidos FROM equipototal  as E INNER JOIN equipo as T ON E.Id_equipo = T.Id_equipo INNER JOIN colaborador as C ON E.Id_Colaborador = C.Id_Colaborador ORDER BY Nombre_equipo';
		$params = array(null);	
		return Database::getRows($sql, $params);
    }
    
    public function createEquipo()
	{
		$sql = 'INSERT INTO Equipo(Nombre_equipo, Id_tipo_equipo) VALUES(?, ?)';
		$params = array($this->Nombre_equipo, $this->Id_tipo_equipo);
		return Database::executeRow($sql, $params);
	}

    //para el modal modificar recuerden
	public function getEquipo()
	{
		$sql = 'SELECT Id_equipo, Nombre_equipo, Id_tipo_equipo FROM Equipo WHERE Id_equipo = ?';
		$params = array($this->Id_equipo);
		return Database::getRow($sql, $params);
    }
    
    public function updateEquipo()
	{
		$sql = 'UPDATE Equipo SET Nombre_equipo = ?, Id_tipo_equipo = ? WHERE Id_equipo = ?';
		$params = array($this->Nombre_equipo, $this->Id_tipo_equipo, $this->Id_equipo);
		return Database::executeRow($sql, $params);
    }
    
    public function deleteEquipo()
	{
		$sql = 'DELETE FROM Equipo WHERE Id_equipo = ?';
		$params = array($this->Id_equipo);
		return Database::executeRow($sql, $params);
	}
}
?>