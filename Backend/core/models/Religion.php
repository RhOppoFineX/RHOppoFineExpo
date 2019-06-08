<?php
class Religion extends Validator    
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id = null;
        private $Religion = null;

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

        public function setReligion($Religion)
        {
            if($this->validateAlphanumeric($Religion, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->Religion = $Religion;
                return true;
            }else{
                return false;
            }
        }

        public function getReligion()
        {
            return $this->Religion;
        }

        public function insertReligion()
        {
            $sql = "INSERT INTO Religion (Religion)
            VALUES (?)";            
            $parametros = array($this->Religion);
            return Database::executeRow($sql, $parametros);
        }

        public function updateReligion()
        {
            $sql = "UPDATE Religion SET Religion = ? WHERE Id_religion = ?";
            $parametros = array($this->Religion, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deleteReligion()
        {
            $sql = "DELETE FROM Religion WHERE Id_religion = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectReligion()
        {
            $sql = "SELECT Id_religion, Religion FROM Religion 
            ORDER BY Religion";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarReligion($valor)
        {
            $sql = "SELECT * FROM Religion WHERE Religion LIKE ? ORDER BY Religion";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getReligionModal()
        {
            $sql = "SELECT * FROM Religion WHERE Id_religion = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

}
?>