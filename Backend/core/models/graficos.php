<?php

class graficos extends Validator
{

    //Ejemplo nada más 
    public function ejemplo()
    {
        $sql = 'SELECT id_garantia, garantia FROM garantia';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
} 