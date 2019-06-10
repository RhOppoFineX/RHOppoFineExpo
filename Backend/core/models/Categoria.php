<?php
class Categoria extends Validator    
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id = null;
        private $Categoria = null;

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

        public function setCategoria($Categoria)
        {
            if($this->validateAlphanumeric($Categoria, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->Categoria = $Categoria;
                return true;
            }else{
                return false;
            }
        }

        public function getCategoria()
        {
            return $this->Categoria;
        }

        public function insertCategoria()
        {
            $sql = "INSERT INTO Categoria (Categoria)
            VALUES (?)";            
            $parametros = array($this->Categoria);
            return Database::executeRow($sql, $parametros);
        }

        public function updateCategoria()
        {
            $sql = "UPDATE Categoria SET Categoria = ? WHERE Id_categoria = ?";
            $parametros = array($this->Categoria, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deleteCategoria()
        {
            $sql = "DELETE FROM Categoria WHERE Id_Categoria = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectCategoria()
        {
            $sql = "SELECT Id_categoria, Categoria FROM Categoria 
            ORDER BY Categoria";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarCategoria($valor)
        {
            $sql = "SELECT * FROM Categoria WHERE Categoria LIKE ? ORDER BY Categoria";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getCategoriaModal()
        {
            $sql = "SELECT * FROM Categoria WHERE Id_categoria = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }                       

}
?>