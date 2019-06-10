<?php
class Parentesco extends Validator    
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id = null;
        private $Parentesco = null;

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

        public function setParentesco($Parentesco)
        {
            if($this->validateAlphanumeric($Parentesco, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->Parentesco = $Parentesco;
                return true;
            }else{
                return false;
            }
        }

        public function getParentesco()
        {
            return $this->Parentesco;
        }

        public function insertParentesco()
        {
            $sql = "INSERT INTO Parentesco (Parentesco)
            VALUES (?)";            
            $parametros = array($this->Parentesco);
            return Database::executeRow($sql, $parametros);
        }

        public function updateParentesco()
        {
            $sql = "UPDATE Parentesco SET Parentesco = ? WHERE Id_parentesco = ?";
            $parametros = array($this->Parentesco, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deleteParentesco()
        {
            $sql = "DELETE FROM Parentesco WHERE Id_parentesco = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectParentesco()
        {
            $sql = "SELECT Id_parentesco, Parentesco FROM Parentesco 
            ORDER BY Parentesco";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarParentesco($valor)
        {
            $sql = "SELECT * FROM Parentesco WHERE Parentesco LIKE ? ORDER BY Parentesco";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getParentescoModal()
        {
            $sql = "SELECT * FROM Parentesco WHERE Id_parentesco = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

}
?>