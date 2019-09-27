<?php
class nivelIdioma extends Validator    
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id = null;
        private $idioma = null;
        private $id_nivel = null;

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

        public function setnivelIdioma($idioma)
        {
            if($this->validateAlphabetic($idioma, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->idioma = $idioma;
                return true;
            }else{
                return false;
            }
        }

        public function getIdioma()
        {
            return $this->idioma;
        }

        public function setId_nivel($Id)
        {
            if($this->validateId($id_nivel))
            {
                $this->id_nivel = $id_nivel;
                return true;
            }else{
                return false;
            }

        }

        public function getId_nivel()
        {
            return $this->id_nivel;
        }

        public function insertnivelidioma()
        {
            $sql = "INSERT INTO nivel_idioma (Nivel)
            VALUES (?)";            
            $parametros = array($this->idioma);
            return Database::executeRow($sql, $parametros);
        }

        public function updatenivelidioma()
        {
            $sql = "UPDATE nivel_idioma SET Nivel = ? WHERE Id_nivel_idioma = ?";
            $parametros = array($this->idioma, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deletenivelIdioma()
        {
            $sql = "DELETE FROM nivel_idioma WHERE Id_nivel_idioma = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectnivelIdioma()
        {
            $sql = "SELECT Id_nivel_idioma, Nivel FROM nivel_idioma 
            ORDER BY nivel";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarnivelIdioma($valor)
        {
            $sql = "SELECT * FROM idioma WHERE idioma LIKE ? ORDER BY idioma";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getnivelIdiomaModal()
        {
            $sql = "SELECT * FROM nivel_idioma WHERE Id_nivel_idioma = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

}
?>