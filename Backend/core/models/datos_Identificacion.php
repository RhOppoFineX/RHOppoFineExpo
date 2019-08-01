<?php

class datosIdentificacion extends Validator
{
    private $Id = null;
    private $Documento = null;
    private $Residencia = null;
    private $lugarExpedicion = null;
    private $Fecha = null;
    private $Profesion = null;
    private $IdEstadoCivil = null;
    private $FechaExpiracion = null;
    private $Num_isss = null;
    private $AFP = null;
    private $NUP = null;
    private $TipoDocumento = null;
    private $EstadoCivil = null;
    
    public function setId($Id)
    {
        if($this->validateId($Id))
        {
            $this->Id = $Id;
            return true;
        }else{
            return false;
        }

    }

    public function getId()
    {
        return $this->Id;
    }

    public function setDocumento($Documento)
    {
        if($this->validateAlphabetic($Documento, 10, 10)){

        }

    }


}

?>