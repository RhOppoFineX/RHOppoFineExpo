<?php

 class tipoUsuario extends Validator
 {

        private $Id = null;
        private $Tipo = null;


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

        public function setTipo($Tipo)
        {
            if($this->validateAlphanumeric($Tipo, 1, 25)){ //controla la longitud de los datos primer numero el minimo segundo el maximo
                $this->Tipo = $Tipo;
                return true;
            }else{
                return false;
            }
        }

        public function getTipo()
        {
            return $this->Tipo;
        }

        public function insertTipoUsuario()
        {
            $sql = "INSERT INTO Tipo_usuario (Tipo_usuario) VALUES (?)";
            $parametros = array($this->Tipo);
            return Database::executeRow($sql, $parametros);   
        }

        public function updateTipoUsuario()
        {
            $sql = "UPDATE Tipo_usuario SET Tipo_usuario = ? WHERE Id_tipo_usuario = ?";
            $parametros = array($this->Tipo, $this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function deleteTipoUsuario()
        {
            $sql = "DELETE FROM Tipo_usuario WHERE Id_tipo_usuario = ?";
            $parametros = array($this->Id);
            return Database::executeRow($sql, $parametros);
        }

        public function selectTipoUsuario()
        {
            $sql = "SELECT Id_tipo_usuario, Tipo_usuario FROM Tipo_usuario 
            ORDER BY Tipo_usuario";
            $parametros = array(null);
            return Database::getRows($sql, $parametros);
        }

        public function buscarTipoUsuario($valor)
        {
            $sql = "SELECT * FROM Religion WHERE Religion LIKE ? ORDER BY Religion";
            $parametros = array("%$valor%");
            return Database::getRows($sql, $parametros);
        }

        //Extrare los datos de la base hacia el actualizarModal esta es su mision
        public function getTipoUsuarioModal()
        {
            $sql = "SELECT * FROM Tipo_usuario WHERE Id_tipo_usuario = ?";
            $parametros = array($this->Id);
            return Database::getRow($sql, $parametros);
        }

        public function readTipoUsuario()
        {
            $sql = 'SELECT count(U.Id_usuario) as Usuario, Tipo_usuario as Cantidad FROM Usuario as U INNER JOIN Tipo_usuario as T ON U.Id_tipo_usuario = T.Id_tipo_usuario GROUP BY U.Id_tipo_usuario';
            $params = array(null);
            return Database::getRows($sql, $params);
        }
    }   

?>