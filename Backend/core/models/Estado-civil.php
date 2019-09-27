<?php
class Estado extends Validator    
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id = null;
        private $Estado_civil = null;

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

        public function setEstado($Estado_civil)
        {
            if($this->validateAlphabetic($Estado_civil, 1, 25)){ 
                $this->Estado_civil = $Estado_civil;
                return true;
            }else{
                return false;
            }
        }

        public function getEstado()
        {
            return $this->Estado_civil;
        }

        public function insertEstado()
        {
            $sql = "INSERT INTO Estado_civil (Estado_civil)
            VALUES (?)";            
            $parametros = array($this->Estado_civil);
            return Database::executeRow($sql, $parametros);
        }

        public function updateEstado()
        {
            $sql = "UPDATE Estado_civil SET Estado_civil = ? WHERE Id_estado_civil = ?";
            $parametros = array($this->Estado_civil, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deleteEstado()
        {
            $sql = "DELETE FROM Estado_civil WHERE Id_estado_civil = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectEstado()
        {
            $sql = "SELECT Id_estado_civil, Estado_civil FROM estado_civil 
            ORDER BY Estado_civil";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarEstado($valor)
        {
            $sql = "SELECT * FROM estado_civil WHERE Estado_civil LIKE ? ORDER BY Estado_civil";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getEstadoModal()
        {
            $sql = "SELECT * FROM estado_civil WHERE Id_estado_civil = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

}
?>