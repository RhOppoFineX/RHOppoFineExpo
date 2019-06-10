<?php
class Idioma extends Validator    
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

        public function setIdioma($idioma)
        {
            if($this->validateAlphanumeric($idioma, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
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

        public function insertIdioma()
        {
            $sql = "INSERT INTO idioma (Idioma)
            VALUES (?)";            
            $parametros = array($this->idioma);
            return Database::executeRow($sql, $parametros);
        }

        public function updateidioma()
        {
            $sql = "UPDATE idioma SET idioma = ? WHERE Id_idioma = ?";
            $parametros = array($this->idioma, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deleteIdioma()
        {
            $sql = "DELETE FROM idioma WHERE Id_idioma = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectIdioma()
        {
            $sql = "SELECT Id_idioma, Idioma FROM idioma 
            ORDER BY idioma";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarIdioma($valor)
        {
            $sql = "SELECT * FROM idioma WHERE idioma LIKE ? ORDER BY idioma";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getIdiomaModal()
        {
            $sql = "SELECT * FROM idioma WHERE Id_idioma = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

}
?>