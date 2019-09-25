<?php

class Colaborador extends Validator
{
    private $Id = null;
    private $Num_documento = null;
    private $Residencia = null;
    private $Lugar_expedicion = null;
    private $Fecha_expedicion = null;
    private $Profesion = null;
    private $Estado_civil = null;
    private $Id_estado_civil = null;
    private $Fecha_expiracion = null;
    private $Numero_ISSS = null;
    private $AFP = null;
    private $NUP = null;
    private $Id_colaborador = null;
    private $Colaborador = null;



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
     * Get the value of Num_documento
     */ 
    public function getNum_documento()
    {
        return $this->Num_documento;
    }

    /**
     * Set the value of Num_documento
     *
     * @return  self
     */ 
    public function setNum_documento($Num_documento)
    {
        if($this->validateAlphanumeric($Num_documento, 3, 12)){
            $this->Num_documento = $Num_documento;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Residencia
     */ 
    public function getResidencia()
    {
        return $this->Residencia;
    }

    /**
     * Set the value of Residencia
     *
     * @return  self
     */ 
    public function setResidencia($Residencia)
    {
        if($this->validateAlphabetic($Residencia, 4, 70)){
            $this->Residencia = $Residencia;
            return true;
        } else {
            return false;
        }       
    }

    /**
     * Get the value of Lugar_expedicion
     */ 
    public function getLugar_expedicion()
    {
        return $this->Lugar_expedicion;
    }

    /**
     * Set the value of Lugar_expedicion
     *
     * @return  self
     */ 
    public function setLugar_expedicion($Lugar_expedicion)
    {
        if($this->validateAlphabetic($Lugar_expedicion, 4, 60)){
            $this->Lugar_expedicion = $Lugar_expedicion;
            return true;
        } else {
            return false;
        }        
    }


    /**
     * Get the value of Estado_civil
     */ 
    public function getEstado_civil()
    {
        return $this->Estado_civil;
    }

    /**
     * Set the value of Estado_civil
     *
     * @return  self
     */ 
    public function setEstado_civil($Estado_civil)
    {
        if($this->validateAlphabetic(4, 25)){
            $this->Estado_civil = $Estado_civil;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Id_Estado_civil
     */ 
    public function getId_Estado_civil()
    {
        return $this->Id_Estado_civil;
    }

    /**
     * Set the value of Id_Id_estado_civil
     *
     * @return  self
     */ 
    public function setId_estado_civil($Id_estado_civil)
    {
        if($this->validateId($Id_estado_civil)){
            $this->Id_estado_civil = $Id_estado_civil;
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * Get the value of Numero_ISSS
     */ 
    public function getNumero_ISSS()
    {
        return $this->Numero_ISSS;
    }

    /**
     * Set the value of Numero_ISSS
     *
     * @return  self
     */ 
    public function setNumero_ISSS($Numero_ISSS)
    {
        //buscar validacion de numero de telefono
        $this->Numero_ISSS = $Numero_ISSS;

        return $this;
    }

    /**
     * Get the value of AFP
     */ 
    public function getAFP()
    {
        return $this->AFP;
    }

    /**
     * Set the value of AFP
     *
     * @return  self
     */ 
    public function setAFP($AFP)
    {
        $this->AFP = $AFP;

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
     * Get the value of Profesion
     */ 
    public function getProfesion()
    {
        return $this->Profesion;
    }

    /**
     * Set the value of Profesion
     *
     * @return  self
     */ 
    public function setProfesion($Profesion)
    {
        if($this->validateAlphanumeric($Profesion, 10, 500)){
            $this->Profesion = $Profesion;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of NUP
     */ 
    public function getNUP()
    {
        return $this->NUP;
    }

    /**
     * Set the value of NUP
     *
     * @return  self
     */ 
    public function setNUP($NUP)
    {
        if($this->validateIntegerControl($NUP, 5, 7)){
            $this->NUP = $NUP;
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
        if($this->validateInteger($Nivel)){
            $this->Nivel = $Nivel;
            return true;
        } else {
            return false;
        }
        
    }


    /**
     * Get the value of Fecha_expiracion
     */ 
    public function getFecha_expiracion()
    {
        return $this->Fecha_expiracion;
    }

    /**
     * Set the value of Fecha_expiracion
     *
     * @return  self
     */ 
    public function setFecha_expiracion($Fecha_expiracion)
    {
        if($this->validateDate($Fecha_expiracion)){
            $this->Fecha_expiracion = $Fecha_expiracion;
            return true;
        } else {
            return false;
        }        
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
        if($this->validateInteger($Estado_colaborador)){
            $this->Estado_colaborador = $Estado_colaborador;
            return true;
        } else {
            return false;
        }        
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
        if($this->validateId($Datos_identificacion)){
            $this->Datos_identificacion = $Datos_identificacion;
            return true;
        } else {
            return false;
        }        
    }

    /**
     * Get the value of Fecha_expedicion
     */ 
    public function getFecha_expedicion()
    {
        return $this->Fecha_expedicion;
    }

    /**
     * Set the value of Fecha_expedicion
     *
     * @return  self
     */ 
    public function setFecha_expedicion($Fecha_expedicion)
    {
        if($this->validateDate($Fecha_expedicion)){
            $this->Fecha_expedicion = $Fecha_expedicion;
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
        if($this->validateAlphabetic($Colaborador, 4, 30)){
            $this->Colaborador = $Colaborador;
            return true;
        } else {
            return false;
        }        
    }

    public function readDatos()
    {
        $sql = 'SELECT Id_datos, Num_documento, Residencia, Lugar_expedicion, Fecha_expedicion, Profesion_oficio, E.Estado_civil as Estado, C.Codigo_colaborador as Colaborador, Fecha_expiracion, Num_ISSS, AFP, NUP, Tipo_documento FROM datos_identificacion as D INNER JOIN Estado_civil as E on E.Id_estado_civil = D.Id_estado_civil INNER JOIN colaborador as C on C.Id_Colaborador = D.Id_Colaborador';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function createDatos()
    {
        $sql = 'insert into datos_identificacion (Num_documento, Residencia, Lugar_expedicion, Fecha_expedicion, Profesion_oficio, Id_estado_civil, Fecha_expiracion, Num_ISSS, AFP, NUP, Tipo_documento, Id_Colaborador) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE())';
        $params = array($this->Codigo_colaborador, $this->Nombres, $this->Apellidos, $this->Genero, $this->Fecha_nacimiento, $this->Id_religion, $this->Id_municipio, $this->Telefono_casa, $this->Telefono_celular, $this->Correo_institucional, $this->Direccion, $this->NIP, $this->Nivel, $this->Estudiando, $this->Estado_colaborador);
        return Database::executeRow($sql, $params);        
    }

    public function getDatos()
    {
        $sql = 'SELECT Id_colaborador, Id_religion, Id_municipio, Telefono_casa, Telefono_celular, Correo_institucional, Direccion_residencial, NIP, Nivel, Estudiando FROM Colaborador WHERE Id_colaborador = ?';
        $params = array($this->Id);
        return Database::getRow($sql, $params);
    }

    public function updateDatos()
    {
        $sql = 'UPDATE Colaborador set Id_religion = ?, Id_municipio = ?, Telefono_casa = ?, Telefono_celular = ?, Correo_institucional = ?, Direccion_residencial = ?, NIP = ?, Nivel = ?, Estudiando = ? WHERE Id_colaborador = ?';
        $params = array($this->Id_religion, $this->Id_municipio, $this->Telefono_casa, $this->Telefono_celular, $this->Correo_institucional, $this->Direccion, $this->NIP, $this->Nivel, $this->Estudiando, $this->Id);
        return Database::executeRow($sql, $params);
    }

    public function disableDatos()
    {
        $sql = 'UPDATE Colaborador SET Estado_colaborador = ? WHERE Id_Colaborador = ?';
        $params = array($this->Estado_colaborador, $this->Id);
        return Database::executeRow($sql, $params);
    }   
    
}