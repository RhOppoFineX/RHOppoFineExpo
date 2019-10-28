<?php 

class DatosFamiliares extends Validator
{
    private $Id = null;
    private $Nombres = null;
    private $Apellidos = null;
    private $Fecha = null;
    private $Id_parentesco = null;
    private $Parentesco = null;
    private $Id_colaborador = null;
    private $Colaborador = null;
    private $Genero = null;
    private $Telefono = null;
    private $Estado = null;
    private $Dependiente = null;

    /**
     * Get the value of Id
     */ 
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set the value of Id
     *
     * @return  self
     */ 
    public function setId($Id)
    {
        if($this->validateId($Id)){
            $this->Id = $Id;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the value of Nombres
     */ 
    public function getNombres()
    {
        return $this->Nombres;
    }

    /**
     * Set the value of Nombres
     *
     * @return  self
     */ 
    public function setNombres($Nombres)
    {
        if($this->validateAlphabetic($Nombres, 3, 50)){
            $this->Nombres = $Nombres;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Apellidos
     */ 
    public function getApellidos()
    {
        return $this->Apellidos;
    }

    /**
     * Set the value of Apellidos
     *
     * @return  self
     */ 
    public function setApellidos($Apellidos)
    {
        if($this->validateAlphabetic($Apellidos, 3, 50)){
            $this->Apellidos = $Apellidos;
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
     * Get the value of Id_parentesco
     */ 
    public function getId_parentesco()
    {
        return $this->Id_parentesco;
    }

    /**
     * Set the value of Id_parentesco
     *
     * @return  self
     */ 
    public function setId_parentesco($Id_parentesco)
    {
        if($this->validateId($Id_parentesco)){
            $this->Id_parentesco = $Id_parentesco;
            return true;
        } else {
            return false;
        }       
    }

    /**
     * Get the value of Parentesco
     */ 
    public function getParentesco()
    {
        return $this->Parentesco;
    }

    /**
     * Set the value of Parentesco
     *
     * @return  self
     */ 
    public function setParentesco($Parentesco)
    {
        if($this->validateAlphabetic($Parentesco, 3, 25)){
            $this->Parentesco = $Parentesco;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Id_colaborador
     */ 
    public function getId_colaborador()
    {
        return $this->Id_colaborador;
    }

    /**
     * Set the value of Id_colaborador
     *
     * @return  self
     */ 
    public function setId_colaborador($Id_colaborador)
    {
        if($this->validateId($Id_colaborador)){
            $this->Id_colaborador = $Id_colaborador;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Colaborador
     */ 
    public function getColaborador()
    {
        return $this->Colaborador;
    }

    /**
     * Set the value of Colaborador
     *
     * @return  self
     */ 
    public function setColaborador($Colaborador)
    {
        if($this->validateAlphabetic($Colaborador, 3, 50)){
            $this->Colaborador = $Colaborador;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Genero
     */ 
    public function getGenero()
    {
        return $this->Genero;
    }

    /**
     * Set the value of Genero
     *
     * @return  self
     */ 
    public function setGenero($Genero)
    {
        if($this->validateAlphabetic($Genero, 1, 2)){
            $this->Genero = $Genero;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Telefono
     */ 
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * Set the value of Telefono
     *
     * @return  self
     */ 
    public function setTelefono($Telefono)
    {       
            $this->Telefono = $Telefono;
            return true;                
    }

    /**
     * Get the value of Dependiente
     */ 
    public function getDependiente()
    {
        return $this->Dependiente;
    }

    /**
     * Set the value of Dependiente
     *
     * @return  self
     */ 
    public function setDependiente($Dependiente)
    {
        if($this->validateCeroOrOne($Dependiente)){
            $this->Dependiente = $Dependiente;
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

    public function readDatosFamiliares()
    {
        $sql = 'SELECT d.Id_datos_familiares, d.Nombres, d.Apellidos, d.Fecha_nacimiento, d.Dependiente, p.Parentesco, c.Nombres as colaborador, d.Genero, d.Numero_telefono, d.Estado
        FROM datosfamiliares as d
        INNER JOIN parentesco as p on d.Id_parentesco = p.Id_parentesco
        INNER JOIN colaborador as c on d.Id_Colaborador = c.Id_Colaborador WHERE d.Estado = 1
        ORDER BY d.Nombres';
        $params = array(null);
        return Database::getRows($sql, $params);
    } 

    public function readDatosFamiliaresF($Id_colaborador)
    {
        $sql = 'SELECT d.Id_datos_familiares, d.Nombres, d.Apellidos, d.Fecha_nacimiento, d.Dependiente, p.Parentesco, c.Nombres as colaborador, d.Genero, d.Numero_telefono, d.Estado
        FROM datosfamiliares as d
        INNER JOIN parentesco as p on d.Id_parentesco = p.Id_parentesco
        INNER JOIN colaborador as c on d.Id_Colaborador = c.Id_Colaborador WHERE d.Estado = 1 and c.Id_colaborador = ?
        ORDER BY d.Nombres';
        $params = array($Id_colaborador);
        return Database::getRows($sql, $params);
    }

    public function createDatosFamiliares()
    {
        $sql = 'INSERT INTO datosfamiliares (Nombres, Apellidos, Fecha_nacimiento, Dependiente, Id_parentesco, Id_colaborador, Genero, Numero_telefono, Estado) VALUES (?,?,?,?,?,?,?,?,?)';
        $params = array($this->Nombres, $this->Apellidos, $this->Fecha, $this->Dependiente, $this->Id_parentesco, $this->Id_colaborador, $this->Genero, $this->Telefono, $this->Estado);
        return Database::executeRow($sql, $params);
    }

    public function getDatosFamiliares()
    {
        $sql = 'SELECT * FROM datosfamiliares WHERE Id_datos_familiares = ?';
        $params = array($this->Id);
        return Database::getRow($sql, $params);
    }

    public function updateDatosFamiliares()
    {
        $sql = 'UPDATE datosfamiliares set Dependiente = ?, Numero_telefono = ? WHERE Id_datos_familiares = ?';
        $params = array($this->Dependiente, $this->Telefono, $this->Id);
        return Database::executeRow($sql, $params);
    }

    public function disableDatos()
    {
        $sql = 'UPDATE datosfamiliares set Estado = ? WHERE Id_datos_familiares = ?';
        $params = array($this->Estado, $this->Id);
        return Database::executeRow($sql, $params);
    }

    
}

?>