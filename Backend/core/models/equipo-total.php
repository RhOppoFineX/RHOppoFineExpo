<?php
class Equipo extends Validator
{
	// Declaración de propiedades
	private $Id = null;
	private $Id_equipo = null;
	private $Id_colaborador = null;
	private $Estado = null;
	
    
	//Metodos set y get de llave foranea
		
	public function setId($Id)
    {
        if($this->validateId($Id)){
            $this->Id = $Id;
            return true;
        } else {
            return false;
        }        
    }

	public function setId_equipo($Id)
    {
        if($this->validateId($Id)){
            $this->Id_equipo = $Id;
            return true;
        } else {
            return false;
        }        
	}
	
	public function setId_colaborador($Id)
    {
        if($this->validateId($Id)){
            $this->Id_colaborador = $Id;
            return true;
        } else {
            return false;
        }        
	}
	/**
	 * Get the value of Estado
	 */ 
	public function getEstado()
	{
		return $this->Estado;
	}

	/**
	 * Set the value of Estado
	 *
	 * @return  self
	 */ 
	public function setEstado($Estado)
	{
		if($this->validateCeroOrOne($Estado)){
			$this->Estado = $Estado;
			return true;
		} else {
			return false;
		}		
	}
	



    // Metodos para manejar el SCRUD
	public function readEquipoTotal()
	{
		$sql = 'SELECT E.Id_equipo_total, T.Nombre_equipo, Codigo_colaborador, Nombres, Apellidos FROM equipototal  as E INNER JOIN equipo as T ON E.Id_equipo = T.Id_equipo INNER JOIN colaborador as C ON E.Id_Colaborador = C.Id_Colaborador WHERE E.Estado = 1 ORDER BY Nombre_equipo';
		$params = array(null);	
		return Database::getRows($sql, $params);
	}
	
	public function readEquipoTotalFiltrado($Id_colaborador)
	{
		$sql = 'SELECT E.Id_equipo_total, T.Nombre_equipo, Codigo_colaborador, Nombres, Apellidos FROM equipototal  as E INNER JOIN equipo as T ON E.Id_equipo = T.Id_equipo INNER JOIN colaborador as C ON E.Id_Colaborador = C.Id_Colaborador WHERE C.Id_colaborador = ? and E.Estado = 1 ORDER BY Nombre_equipo';
		$params = array($Id_colaborador);	
		return Database::getRows($sql, $params);
    }
    
    public function createEquipo()
	{
		$sql = 'INSERT INTO equipototal (Id_equipo, Id_Colaborador) VALUES(?, ?)';
		$params = array($this->Id_equipo, $this->Id_colaborador);
		return Database::executeRow($sql, $params);
	}

    //para el modal modificar recuerden
	public function getEquipo()
	{
		$sql = 'SELECT Id_equipo_total, Id_equipo, Id_colaborador FROM equipototal WHERE Id_equipo_total = ?';
		$params = array($this->Id);
		return Database::getRow($sql, $params);
    }
    
    public function updateEquipo()
	{
		$sql = 'UPDATE equipototal SET Id_equipo = ?, Id_Colaborador = ? WHERE Id_equipo_total = ?';
		$params = array($this->Id_equipo, $this->Id_colaborador, $this->Id);
		return Database::executeRow($sql, $params);
    }
    
    public function disableEquipo()
	{
		$sql = 'UPDATE EquipoTotal SET Estado = ? WHERE Id_equipo_total = ?';
		$params = array($this->Estado, $this->Id);
		return Database::executeRow($sql, $params);
	}
	
}
?>