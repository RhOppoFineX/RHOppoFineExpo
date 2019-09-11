<?php

class Colaborador extends Validator
{
    private $Id = null;
    private $Codigo_colaborador = null;
    private $Nombres = null;
    private $Apellidos = null;
    private $Genero = null;
    private $Religion = null;
    private $Id_religion = null;
    private $Telefono_casa = null;
    private $Telefono_celular = null;
    private $Correo_institucional = null;
    private $Direccion = null;
    private $NIP = null;
    private $Nivel = null;
    private $Estudiando = null;
    private $Fecha_ingreso = null;
    private $Estado_colaborador = null;
    private $Datos_identificacion = null;


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
        if($this>validateId($Id)){
            $this->Id = $Id;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Codigo_colaborador
     */ 
    public function getCodigo_colaborador()
    {
        return $this->Codigo_colaborador;
    }

    /**
     * Set the value of Codigo_colaborador
     *
     * @return  self
     */ 
    public function setCodigo_colaborador($Codigo_colaborador)
    {
        if($this->validateAlphanumeric(4, 6, $Codigo_colaborador)){
            $this->Codigo_colaborador = $Codigo_colaborador;
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
        if($this->validateAlphabetic(4, 50, $Nombres)){
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
        if($this->validateAlphabetic(4, 50, $Apellidos)){
            $this->Apellidos = $Apellidos;
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
        if($this->validateAlphabetic(1,2,$Genero)){
            $this->Genero = $Genero;
            return true;            
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Religion
     */ 
    public function getReligion()
    {
        return $this->Religion;
    }

    /**
     * Set the value of Religion
     *
     * @return  self
     */ 
    public function setReligion($Religion)
    {
        if($this->validateAlphabetic(4, 25)){
            $this->Religion = $Religion;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Id_religion
     */ 
    public function getId_religion()
    {
        return $this->Id_religion;
    }

    /**
     * Set the value of Id_religion
     *
     * @return  self
     */ 
    public function setId_religion($Id_religion)
    {
        if($this->validateId($Id_religion)){
            $this->Id_religion = $Id_religion;
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * Get the value of Telefono_casa
     */ 
    public function getTelefono_casa()
    {
        return $this->Telefono_casa;
    }

    /**
     * Set the value of Telefono_casa
     *
     * @return  self
     */ 
    public function setTelefono_casa($Telefono_casa)
    {
        //buscar validacion de numero de telefono
        $this->Telefono_casa = $Telefono_casa;

        return $this;
    }

    /**
     * Get the value of Telefono_celular
     */ 
    public function getTelefono_celular()
    {
        return $this->Telefono_celular;
    }

    /**
     * Set the value of Telefono_celular
     *
     * @return  self
     */ 
    public function setTelefono_celular($Telefono_celular)
    {
        $this->Telefono_celular = $Telefono_celular;

        return $this;
    }

    /**
     * Get the value of Correo_institucional
     */ 
    public function getCorreo_institucional()
    {        
        return $this->Correo_institucional;
    }

    /**
     * Set the value of Correo_institucional
     *
     * @return  self
     */ 
    public function setCorreo_institucional($Correo_institucional)
    {
        if($this->validateEmail($Correo_institucional)){
            $this->Correo_institucional = $Correo_institucional;
            return true;            
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Direccion
     */ 
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * Set the value of Direccion
     *
     * @return  self
     */ 
    public function setDireccion($Direccion)
    {
        if($this->validateAlphanumeric($Direccion, 10, 250)){
            $this->Direccion = $Direccion;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of NIP
     */ 
    public function getNIP()
    {
        return $this->NIP;
    }

    /**
     * Set the value of NIP
     *
     * @return  self
     */ 
    public function setNIP($NIP)
    {
        if($this->validateIntegerControl($NIP, 7, 7)){
            $this->NIP = $NIP;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Nivel
     */ 
    public function getNivel()
    {        
        return $this->Nivel;
    }

    /**
     * Set the value of Nivel
     *
     * @return  self
     */ 
    public function setNivel($Nivel)
    {
        if($this->validateInteger()){
            $this->Nivel = $Nivel;
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * Get the value of Estudiando
     */ 
    public function getEstudiando()
    {
        return $this->Estudiando;
    }

    /**
     * Set the value of Estudiando
     *
     * @return  self
     */ 
    public function setEstudiando($Estudiando)
    {
        if($this->validateInteger()){
            $this->Estudiando = $Estudiando;
            return true;                        
        } else {
            return false;
        }
        
    }

    /**
     * Get the value of Fecha_ingreso
     */ 
    public function getFecha_ingreso()
    {
        return $this->Fecha_ingreso;
    }

    /**
     * Set the value of Fecha_ingreso
     *
     * @return  self
     */ 
    public function setFecha_ingreso($Fecha_ingreso)
    {
        $this->Fecha_ingreso = $Fecha_ingreso;

        return $this;
    }

    /**
     * Get the value of Estado_colaborador
     */ 
    public function getEstado_colaborador()
    {
        return $this->Estado_colaborador;
    }

    /**
     * Set the value of Estado_colaborador
     *
     * @return  self
     */ 
    public function setEstado_colaborador($Estado_colaborador)
    {
        $this->Estado_colaborador = $Estado_colaborador;

        return $this;
    }

    /**
     * Get the value of Datos_identificacion
     */ 
    public function getDatos_identificacion()
    {
        return $this->Datos_identificacion;
    }

    /**
     * Set the value of Datos_identificacion
     *
     * @return  self
     */ 
    public function setDatos_identificacion($Datos_identificacion)
    {
        $this->Datos_identificacion = $Datos_identificacion;

        return $this;
    }
}