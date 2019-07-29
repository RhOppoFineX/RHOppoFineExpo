<?php
class Area_detalle extends Validator
{
	// Declaración de propiedades
	private $id = null;
	//LLAVE FORANEA
    private $Id_laboral = null;
    private $Id_colaborador = null;

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

	// Metodos para manejar el SCRUD
	public function readarea_detalle()
	{
		$sql = 'SELECT Id_area_detalle, A.Sueldo_plaza, A.Fecha_ingreso, A.Inicio_contrato, A.Fin_contrato, A.Horas_al_dia, 
        C.Codigo_colaborador, C.Nombres, C.Apellidos
        FROM Area_detalle AS Ar
        INNER JOIN Area_laboral AS A ON Ar.Id_laboral = A.Id_laboral 
        INNER JOIN Colaborador AS C ON Ar.Id_colaborador = C.Id_colaborador
        ORDER BY Id_area_detalle';
		$params = array(null);	
		return Database::getRows($sql, $params);
    }
    
}
?>