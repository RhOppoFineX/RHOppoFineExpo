<?php
class Puesto extends Validator    
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id = null;
        private $Puesto = null;

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

        public function setPuesto($Puesto)
        {
            if($this->validateAlphabetic($Puesto, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->Puesto = $Puesto;
                return true;
            }else{
                return false;
            }
        }

        public function getPuesto()
        {
            return $this->Puesto;
        }

        public function insertPuesto()
        {
            $sql = "INSERT INTO Puesto (Puesto)
            VALUES (?)";            
            $parametros = array($this->Puesto);
            return Database::executeRow($sql, $parametros);
        }

        public function updatePuesto()
        {
            $sql = "UPDATE Puesto SET Puesto = ? WHERE Id_puesto = ?";
            $parametros = array($this->Puesto, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deletePuesto()
        {
            $sql = "DELETE FROM Puesto WHERE Id_puesto = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectPuesto()
        {
            $sql = "SELECT Id_puesto, Puesto FROM Puesto 
            ORDER BY Puesto";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarPuesto($valor)
        {
            $sql = "SELECT * FROM Puesto WHERE Puesto LIKE ? ORDER BY Puesto";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getPuestoModal()
        {
            $sql = "SELECT * FROM Puesto WHERE Id_puesto = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

}
?>