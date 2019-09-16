<?php
class Area_detalle extends Validator
{
	// Declaración de propiedades
	private $id = null;
	//LLAVE FORANEA
    private $Id_laboral = null;
	private $Id_colaborador = null;
	private $Estado = null;

	//Metodos set y get de llave foranea
	public function setId_laboral($value)
	{
		if($this->validateId($value)){
			$this->setId_laboral = $value;
			return true;
		}else{
			return false;
		}
	}

	public function getId_laboral()
	{
		return $this->getId_laboral;
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

	public function setId_colaborador($value)
	{
		if($this->validateId($value)){
			$this->setId_colaborador = $value;
			return true;
		}else{
			return false;
		}
	}

	public function getId_colaborador()             
	{
		return $this->getId_colaborador;
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

    public function createArea_detalle()
	{
		$sql = 'INSERT INTO area_detalle(Id_laboral, Id_Colaborador) VALUES(?, ?)';
		$params = array($this->Id_laboral, $this->Id_colaborador);
		return Database::executeRow($sql, $params);
	}

	// Metodos para manejar el SCRUD
	public function readArea_detalle()
	{
		$sql = 'SELECT Id_area_detalle, A.Sueldo_plaza AS sueldo, A.Fecha_ingreso AS fechaingreso, A.Inicio_contrato AS inicio, A.Fin_contrato AS fin, A.Horas_al_dia AS hora, 
        C.Codigo_colaborador AS codigo, C.Nombres AS nombres, C.Apellidos AS apellidos 
        FROM Area_detalle AS Ar
        INNER JOIN Area_laboral AS A ON Ar.Id_laboral = A.Id_laboral 
        INNER JOIN Colaborador AS C ON Ar.Id_colaborador = C.Id_colaborador
        ORDER BY Id_area_detalle';
		$params = array(null);	
		return Database::getRows($sql, $params);
	}

	public function getArea_detalle()
	{
		$sql = 'SELECT Id_area_detalle, Id_laboral, Id_colaborador FROM area_detalle WHERE Id_area_detalle = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}
	
	public function updateArea_detalle()
	{
		$sql = 'UPDATE area_detalle SET Id_laboral = ?, Id_colaborador = ? WHERE Id_area_detalle = ?';
		$params = array($this->Id_laboral, $this->Id_colaborador, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteArea_detalle()
	{
		$sql = 'DELETE FROM area_detalle WHERE Id_area_detalle = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	public function disableArea_detalle()
	{
		$sql = 'UPDATE Usuario SET Estado = ? WHERE Id_usuario = ?';
		$params = array($this->Estado, $this->id);
		return Database::executeRow($sql, $params);
	}
    
}
?>