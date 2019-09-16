<?php
class Laboral extends Validator
{
	// Declaración de propiedades
    private $id = null;
    private $id_area = null;
    private $id_puesto = null;
    private $sueldo = null;
    private $fecha = null;
    private $inicio = null;
    private $fin = null;
    private $horas = null;
    
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

	public function setSueldo($value)
	{
		if ($this->validateMoney($value, 1, 50)) {
			$this->sueldo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getSueldo()
	{
		return $this->sueldo;
    }
    
    public function setFecha($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->fecha = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getFecha()
	{
		return $this->fecha;
    }
    
    public function setInicio($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->inicio = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getInicio()
	{
		return $this->inicio;
    }
    
    public function setFin($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->fin = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getFin()
	{
		return $this->fin;
    }
    
    public function setHoras($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->horas = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getHoras()
	{
		return $this->horas;
	}

	
	
	

	// Metodos para manejar el SCRUD
	public function readLaboral()
	{
		$sql = 'SELECT Id_idioma, Idioma, N.Nivel as Nivel FROM idioma as I INNER JOIN nivel_idioma as N ON I.Id_nivel_idioma = N.Id_nivel_idioma ORDER BY Id_idioma';
		$params = array(null);	
		return Database::getRows($sql, $params);
	}

    public function createLaboral()
	{
		$sql = 'INSERT INTO area_laboral(Id_area, Id_puesto, Sueldo_plaza, Fecha_plaza, Inicio_contrato, Fin_contrato, Horas_al_dia) VALUES(?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->id_area, $this->id_puesto, $this->sueldo, $this->fecha, $this->inicio, $this->fin, $this->horas);
		return Database::executeRow($sql, $params);
	}
	//para el modal modificar recuerden
	public function getLaboralModal()
	{
		$sql = 'SELECT Id_idioma, Id_area, Id_puesto, Sueldo_plaza, Fecha_plaza, Inicio_contrato, Fin_contrato, Horas_al_dia FROM area_laboral WHERE Id_laboral = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateLaboral()
	{
		$sql = 'UPDATE area_laboral SET Id_area = ?, Id_puesto = ?, Sueldo_plaza = ?, Fecha_plaza = ?, Inicio_contrato = ?, Fin_contrato = ?, Horas_al_dia = ? WHERE Id_laboral = ?';
		$params = array($this->id_area, $this->id_puesto, $this->sueldo, $this->fecha, $this->inicio, $this->fin, $this->horas, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteLaboral()
	{
		$sql = 'DELETE FROM area_laboral WHERE Id_laboral = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>