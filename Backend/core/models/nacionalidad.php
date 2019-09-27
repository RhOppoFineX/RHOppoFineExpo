<?php
class nacionalidad extends Validator    
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id = null;
        private $nacionalidad = null;
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

        public function setnacionalidad($nacionalidad)
        {
            if($this->validateAlphabetic($nacionalidad, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->nacionalidad = $nacionalidad;
                return true;
            }else{
                return false;
            }
        }

        public function getnacionalidad()
        {
            return $this->nacionalidad;
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

        public function insertnacionalidad()
        {
            $sql = "INSERT INTO nacionalidad (nacionalidad)
            VALUES (?)";            
            $parametros = array($this->nacionalidad);
            return Database::executeRow($sql, $parametros);
        }

        public function updatenacionalidad()
        {
            $sql = "UPDATE nacionalidad SET Nacionalidad = ? WHERE Id_nacionalidad = ?";
            $parametros = array($this->nacionalidad, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deletenacionalidad()
        {
            $sql = "DELETE FROM nacionalidad WHERE Id_nacionalidad = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectnacionalidad()
        {
            $sql = "SELECT Id_nacionalidad, Nacionalidad FROM nacionalidad 
            ORDER BY Nacionalidad";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarnacionalidad($valor)
        {
            $sql = "SELECT * FROM Nacionalidad WHERE Nacionalidad LIKE ? ORDER BY Nacionalidad";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getnacionalidadModal()
        {
            $sql = "SELECT * FROM Nacionalidad WHERE Id_nacionalidad = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

}
?>