<?php

class graficos extends Validator
{

    //Ejemplo nada más 
    public function ejemplo()
    {
        $sql = 'SELECT count(U.Id_usuario) as Usuario, Tipo_usuario as Cantidad FROM Usuario as U INNER JOIN Tipo_usuario as T ON U.Id_tipo_usuario = T.Id_tipo_usuario GROUP BY U.Id_tipo_usuario';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
} 