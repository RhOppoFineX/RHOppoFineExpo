<?php
class TipoEquipo extends Validator    //Nombre que se le coloca al inicio de la api ($nombre = new nombre1)
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id_tipo_equipo = null;
        private $Tipo_equipo = null;

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

        public function setTipo($Tipo_equipo)
        {
            if($this->validateAlphabetic($Tipo_equipo, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->Tipo_equipo = $Tipo_equipo;
                return true;
            }else{
                return false;
            }
        }

        public function getTipo()
        {
            return $this->Tipo_equipo;
        }

        public function insertTipo()
        {
            $sql = "INSERT INTO tipo_equipo (Tipo_Equipo)
            VALUES (?)";            
            $parametros = array($this->Tipo_equipo);
            return Database::executeRow($sql, $parametros);
        }

        public function updateTipo()
        {
            $sql = "UPDATE tipo_equipo SET Tipo_equipo = ? WHERE Id_tipo_equipo = ?";
            $parametros = array($this->Tipo_equipo, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deleteTipo()
        {
            $sql = "DELETE FROM tipo_equipo WHERE Id_tipo_equipo = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectTipo()
        {
            $sql = "SELECT Id_tipo_equipo, Tipo_equipo FROM tipo_equipo 
            ORDER BY Tipo_equipo";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarTipo($valor)
        {
            $sql = "SELECT * FROM Tipo_equipo WHERE Tipo_equipo LIKE ? ORDER BY Tipo_equipo";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extraer los datos de la base hacia el actualizarModal esta es su mision
        public function getTipoModal()
        {
            $sql = "SELECT * FROM Tipo_equipo WHERE Id_tipo_equipo = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

    }
?>