<?php
class Salud extends Validator    
{       
        //Campos segun la base de datos siempre con sus metodos set() y get()
        private $Id_salud = null;
        private $Enfermedades_Tratamiento = null;
        private $Descripcion_enfermedades = null;
        private $Medicamentos = null;
        private $Descripcion_medicamentos = null;
        private $Alergias = null;
        private $Descripcion_alergias = null;
        private $Alergias_medicamentos = null;
        private $Descripcion_alergias_medicamentos = null;      
        private $Id_colaborador = null;
        private $Estado = null;


        /**
         * Get the value of Id_salud
         */ 
        public function getId_salud()
        {
                return $this->Id_salud;
        }

        /**
         * Set the value of Id_salud
         *
         * @return  self
         */ 
        public function setId_salud($Id_salud)
        {
            if($this->validateId($Id_salud)){
                $this->Id_salud = $Id_salud;
                return true;                          

            } else {
                return false;
            }               
        }

           /**
         * Get the value of Id_colaborador
         */ 
        public function getId_colaborador()
        {
                return $this->Id_colaborador;
        }

        /**
         * Set the value of Id_colaborador
         *
         * @return  self
         */ 
        public function setId_colaborador($Id_colaborador)
        {
            if($this->validateId($Id_colaborador)){
                $this->Id_colaborador = $Id_colaborador;
                return true;
            } else {
                return false;
            }                
        }

        /**
         * Get the value of Enfermedades_Tratamiento
         */ 
        public function getEnfermedades_Tratamiento()
        {
                return $this->Enfermedades_Tratamiento;
        }

        /**
         * Set the value of Enfermedades_Tratamiento
         *
         * @return  self
         */ 
        public function setEnfermedades_Tratamiento($Enfermedades_Tratamiento)
        {
            if($this->validateCeroOrOne($Enfermedades_Tratamiento)){
                $this->Enfermedades_Tratamiento = $Enfermedades_Tratamiento;
                return true;
            } else {
                return false;
            }                
        }

        /**
         * Get the value of Descripcion_enfermedades
         */ 
        public function getDescripcion_enfermedades()
        {
                return $this->Descripcion_enfermedades;
        }

        /**
         * Set the value of Descripcion_enfermedades
         *
         * @return  self
         */ 
        public function setDescripcion_enfermedades($Descripcion_enfermedades)
        {
            if($this->validateAlphanumeric($Descripcion_enfermedades, 1, 250)){
                $this->Descripcion_enfermedades = $Descripcion_enfermedades;
                return true;
            } else {
                return false;
            }                
        }

        /**
         * Get the value of Medicamentos
         */ 
        public function getMedicamentos()
        {
                return $this->Medicamentos;
        }

        /**
         * Set the value of Medicamentos
         *
         * @return  self
         */ 
        public function setMedicamentos($Medicamentos)
        {
            if($this->validateCeroOrOne($Medicamentos)){
                $this->Medicamentos = $Medicamentos;
                return true;
            } else {
                return false;
            }                
        }

        /**
         * Get the value of Descripcion_medicamentos
         */ 
        public function getDescripcion_medicamentos()
        {
                return $this->Descripcion_medicamentos;
        }

        /**
         * Set the value of Descripcion_medicamentos
         *
         * @return  self
         */ 
        public function setDescripcion_medicamentos($Descripcion_medicamentos)
        {
            if($this->validateAlphanumeric($Descripcion_medicamentos, 1, 250)){
                $this->Descripcion_medicamentos = $Descripcion_medicamentos;
                return true;
            } else {
                return false;
            }                
        }

        /**
         * Get the value of Alergias
         */ 
        public function getAlergias()
        {
                return $this->Alergias;
        }

        /**
         * Set the value of Alergias
         *
         * @return  self
         */ 
        public function setAlergias($Alergias)
        {
            if($this->validateCeroOrOne($Alergias)){
                $this->Alergias = $Alergias;
                return true;
            } else {
                return false;
            }                
        }

        /**
         * Get the value of Descripcion_alergias
         */ 
        public function getDescripcion_alergias()
        {
                return $this->Descripcion_alergias;
        }

        /**
         * Set the value of Descripcion_alergias
         *
         * @return  self
         */ 
        public function setDescripcion_alergias($Descripcion_alergias)
        {
            if($this->validateAlphanumeric($Descripcion_alergias, 1, 250)){
                $this->Descripcion_alergias = $Descripcion_alergias;
                return true;
            } else {
                return false;
            }                
        }

        /**
         * Get the value of Alergias_medicamentos
         */ 
        public function getAlergias_medicamentos()
        {
                return $this->Alergias_medicamentos;
        }

        /**
         * Set the value of Alergias_medicamentos
         *
         * @return  self
         */ 
        public function setAlergias_medicamentos($Alergias_medicamentos)
        {
            if($this->validateCeroOrOne($Alergias_medicamentos)){
                $this->Alergias_medicamentos = $Alergias_medicamentos;
                return true;
            } else {
                return false;
            }               
        }

        /**
         * Get the value of Descripcion_alergias_medicamentos
         */ 
        public function getDescripcion_alergias_medicamentos()
        {
                return $this->Descripcion_alergias_medicamentos;
        }

        /**
         * Set the value of Descripcion_alergias_medicamentos
         *
         * @return  self
         */ 
        public function setDescripcion_alergias_medicamentos($Descripcion_alergias_medicamentos)
        {
            if($this->validateAlphanumeric($Descripcion_alergias_medicamentos,1, 250)){
                $this->Descripcion_alergias_medicamentos = $Descripcion_alergias_medicamentos;
                return true;
            } else {
                return false;
            }                
        }

        /**
         * Get the value of Estado
         */ 
        public function getEstado()
        {
                return $this->Estado;
        }

        /**
         * Set the value of Estado
         *
         * @return  self
         */ 
        public function setEstado($Estado)
        {
            if($this->validateCeroOrOne($Estado)){
                $this->Estado = $Estado;
                return true;
            } else {
                return false;
            }                
        }

        public function readSalud()
        {
            $sql = "SELECT Id_Salud, Enfermedades_Tratamiento, Medicamentos, Alergias, Alergias_medicamentos, C.Codigo_colaborador, Nombres, Apellidos FROM Salud as S INNER JOIN Colaborador as C ON C.Id_Colaborador = S.Id_Colaborador WHERE S.Estado = 1";
            $params = array(null);
            return Database::getRows($sql, $params);
        }

        public function readSaludF($Id_Colaborador)
        {
            $sql = "SELECT Id_Salud, Enfermedades_Tratamiento, Medicamentos, Alergias, Alergias_medicamentos, C.Codigo_colaborador, Nombres, Apellidos FROM Salud as S INNER JOIN Colaborador as C ON C.Id_Colaborador = S.Id_Colaborador WHERE S.Estado = 1 and C.Id_Colaborador = ?";
            $params = array($Id_Colaborador);
            return Database::getRows($sql, $params);
        }

        public function createSalud()
        {
            $sql = 'INSERT INTO Salud (Enfermedades_Tratamiento, Descripcion_enfermedades, Medicamentos, Descripcion_medicamentos, Alergias, Descripcion_alergias, Alergias_medicamentos, Descripcion_alergias_medicamentos, Id_Colaborador) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
            $params = array($this->Enfermedades_Tratamiento, $this->Descripcion_enfermedades, $this->Medicamentos, $this->Descripcion_medicamentos, $this->Alergias, $this->Descripcion_alergias, $this->Alergias_medicamentos, $this->Descripcion_alergias_medicamentos, $this->Id_colaborador);
            return Database::executeRow($sql, $params);
        }

        public function getSalud()
        {
            $sql = 'SELECT * FROM Salud WHERE Id_salud = ?';
            $params = array($this->Id_salud);
            return Database::getRow($sql, $params);
        }

        public function updateSalud()
        {
            $sql = 'UPDATE Salud set Enfermedades_Tratamiento = ?, Descripcion_enfermedades = ?, Medicamentos = ?, Descripcion_medicamentos = ?, Alergias = ?, Descripcion_alergias = ?, Alergias_medicamentos = ?, Descripcion_alergias_medicamentos = ? WHERE Id_salud = ?';
            $params = array($this->Enfermedades_Tratamiento, $this->Descripcion_enfermedades, $this->Medicamentos, $this->Descripcion_medicamentos, $this->Alergias, $this->Descripcion_alergias, $this->Alergias_medicamentos, $this->Descripcion_alergias_medicamentos, $this->Id_salud);
            return Database::executeRow($sql, $params);
        }

        public function disable()
        {
            $sql = 'UPDATE Salud set Estado = ? WHERE Id_salud = ?';
            $params = array($this->Estado, $this->Id_salud);
            return Database::executeRow($sql , $params);
        }

     

        
}
?>