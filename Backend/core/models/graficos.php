<?php

class graficos extends Validator
{

    //Ejemplo nada más 
    public function usuarios()
    {
        $sql = 'SELECT count(U.Id_usuario) as Usuario, Tipo_usuario as Tipos FROM Usuario as U INNER JOIN Tipo_usuario as T ON U.Id_tipo_usuario = T.Id_tipo_usuario GROUP BY U.Id_tipo_usuario';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
    
    public function genero()
    {
        $sql = 'SELECT count(Id_colaborador) as Colaborador, Genero, sum(Id_colaborador) as Total FROM Colaborador GROUP BY Genero';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    public function religion()
    {
        $sql = 'SELECT count(Id_colaborador) as Colaborador, Religion FROM Colaborador as C INNER JOIN Religion as R ON C.Id_religion = R.Id_religion GROUP BY C.Id_religion';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    public function academico()
    {
        $sql = 'SELECT count(C.Id_colaborador) as Colaborador, Ca.Categoria as Categoria FROM Educacion as E INNER JOIN Colaborador as C ON C.Id_colaborador = E.Id_colaborador INNER JOIN Categoria as Ca ON Ca.Id_categoria = E.Id_categoria GROUP BY Ca.Categoria';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    public function cristian()
    {
        $sql = 'SELECT FROM Colaborador as C';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
} 