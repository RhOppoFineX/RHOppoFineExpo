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
        $this->Id = $Id;

        return $this;
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
        $this->Nombres = $Nombres;

        return $this;
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
        $this->Apellidos = $Apellidos;

        return $this;
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
        $this->Fecha = $Fecha;

        return $this;
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
        $this->Id_parentesco = $Id_parentesco;

        return $this;
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
        $this->Parentesco = $Parentesco;

        return $this;
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
        $this->Id_colaborador = $Id_colaborador;

        return $this;
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
        $this->Colaborador = $Colaborador;

        return $this;
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
        $this->Genero = $Genero;

        return $this;
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

        return $this;
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
        $this->Estado = $Estado;

        return $this;
    }

    public function readDatosFamiliares()
    {
        $sql = 'SELECT d.Nombres, d.Apellidos, d.Fecha_nacimiento, d.Dependiente, p.Parentesco, c.Nombres as colaborador, d.Genero, d.Numero_telefono, d.Estado
        FROM datosfamiliares as d
        INNER JOIN parentesco as p on d.Id_parentesco = p.Id_parentesco
        INNER JOIN colaborador as c on d.Id_Colaborador = c.Id_Colaborador
        ORDER BY d.Nombres';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function createDatosFamiliares()
    {
        $sql = 'insert into datos_familiares (Nombres, Apellidos, Fecha_nacimiento, Dependiente, Id_parentesco, Id_colaborador, Genero, Numero_telefono, Estado) VALUES (?,?,?,?,?,?,?,?,?)';
        $params = array($this->Nombres, $this->Apellidos, $this->Fecha_nacimiento, $this->Dependiente, $this->Id_parentesco, $this->Id_colaborador, $this->Genero, $this->Numero_telefono, $this->Estado);
        return Database::executeRow($sql, $params);
    }
}

?>