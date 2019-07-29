<?php
class Area extends Validator
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id = null;
        private $Area = null;
        private $Estado = null;

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

        public function setArea($Area)
        {
            if($this->validateAlphabetic($Area, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->Area = $Area;
                return true;
            }else{
                return false;
            }
        }

        public function getArea()
        {
            return $this->Area;
        }

        public function setEstado($Estado)
        {
            if($Estado === 0 || $Estado === 1){
                $this->Estado = $Estado;
                return true;
            }else{
                return false;
            }            
        }

        public function getEstado()
        {
            return $this->Estado;
        }

        public function insertArea()
        {
            $sql = "INSERT INTO Area (Area)
            VALUES (?)";            
            $parametros = array($this->Area);
            return Database::executeRow($sql, $parametros);
        }

        public function updateArea()
        {
            $sql = "UPDATE Area SET Area = ? WHERE Id_area = ?";
            $parametros = array($this->Area, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deleteArea()
        {
            $sql = "DELETE FROM Area WHERE Id_area = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function disableArea()
        {
            $sql = "UPDATE Area SET Estado = ? WHERE Id_area = ?";
            $parametros = array($this->Estado, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectArea()
        {
            $sql = "SELECT Id_area, Area FROM Area 
            ORDER BY Area";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarArea($valor)
        {
            $sql = "SELECT * FROM Area WHERE Area LIKE ? ORDER BY Area";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getAreaModal()
        {
            $sql = "SELECT Id_area, Area FROM Area WHERE Id_area = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

}
?>