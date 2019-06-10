<?php
class Municipio extends Validator    
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id = null;
        private $Municipio = null;
        private $Id_departamento = null;

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

        public function setMunicipio($Municipio)
        {
            if($this->validateAlphanumeric($Municipio, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->Municipio = $Municipio;
                return true;
            }else{
                return false;
            }
        }

        public function getMunicipio()
        {
            return $this->Municipio;
        }

        public function setIdDepartamento($Id_departamento)
        {
            if($this->validateId($Id_departamento){ 
                $this->Id_departamento = $Id_departamento;
                return true;
            }else{
                return false;
            }
        }

        public function getIdDepartamento()
        {
            return $this->Id_departamento;
        }

        public function insertMunicipio()
        {
            $sql = "INSERT INTO Municipio (Municipio, Id_departamento) VALUES (?, ?)";            
            $parametros = array($this->Municipio, $this->$Id_departamento);
            return Database::executeRow($sql, $parametros);
        }

        public function updateMunicipio()
        {
            $sql = "UPDATE Municipio SET Municipio = ? WHERE Id_municipio = ?";
            $parametros = array($this->Municipio, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deleteMunicipio()
        {
            $sql = "DELETE FROM Municipio WHERE Id_municipio = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectMunicipio()
        {
            $sql = "SELECT Id_municipio, Municipio FROM Municipio 
            ORDER BY Municipio";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarMunicipio($valor)
        {
            $sql = "SELECT * FROM Municipio WHERE Municipio LIKE ? ORDER BY Municipio";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getMunicipioModal()
        {
            $sql = "SELECT Id_municipio, Municipio, Id_departamento FROM Municipio WHERE Id_municipio = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }   
        
        public function readMunipioDepartamento()
        {
            $sql = 'SELECT id_municipio, Municipio, Id_departamento FROM Municipio INNER JOIN Departamento ON Municipio.Id_departamento = Departamento.Id_departamento WHERE id_departamento = ? ORDER BY Municipio';
            $params = array($this->Id_departamento);
            return Database::getRows($sql, $params);
        }

        public function readMunicipios()
        {
            $sql = 'SELECT id_municipio, Municipio, Id_departamento FROM Municipio INNER JOIN Departamento ON Municipio.Id_departamento = Departamento.Id_departamento ORDER BY Municipio';
            $params = array(null);
            return Database::getRows($sql, $params);
        }

        public function readDepartamento()
	{
		$sql = 'SELECT id_departamento, Departamento, Id_nacionalidad FROM Departamento';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

}
?>