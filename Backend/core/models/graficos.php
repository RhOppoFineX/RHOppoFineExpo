<?php

class graficos extends Validator
{
    private $Id_departamento = null;//Id de tabla padre
    private $Genero = null;//Campo de Colaborador

    public function setGenero($Genero)
    {
       $this->Genero = $Genero;
    }

    public function getGenero()
    {
        return $this->Genero;
    }

    //Metodos set y get de llave foranea
	public function setId_departamento($value)
	{
		if($this->validateId($value)){
			$this->Id_departamento = $value;
			return true;
		}else{
			return false;
		}
	}

	public function getId_departamento()
	{
		return $this->Id_departamento;
	}

    //Ejemplo nada más 
    public function usuarios()
    {
        $sql = 'SELECT count(U.Id_usuario) as Usuario, Tipo_usuario as Tipos, ( ( count(U.Id_usuario) * 100) / (select count(*) from usuario)) as Porcentaje FROM Usuario as U INNER JOIN Tipo_usuario as T ON U.Id_tipo_usuario = T.Id_tipo_usuario GROUP BY U.Id_tipo_usuario';
		$params = array(null);
		return Database::getRows($sql, $params);
    }
    
    public function genero()
    {
        $sql = 'SELECT count(Id_colaborador) as Colaborador, Genero, ( ( count(Id_colaborador) * 100) / (select count(*) from Colaborador)) as Porcentaje FROM Colaborador GROUP BY Genero';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    public function colaboradorservicio()
    {
        $sql = 'SELECT count(Ad.Id_colaborador) as Colaborador, A.area as Area, ( ( count(Ad.Id_colaborador) * 100) / (select count(*) from area_detalle)) as Porcentaje FROM Colaborador as C INNER JOIN area_detalle as Ad ON Ad.Id_colaborador = C.Id_colaborador INNER JOIN area_laboral as Al ON Al.Id_laboral = Ad.Id_laboral INNER JOIN Area as A ON A.Id_area = Al.Id_area GROUP BY A.Id_area';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    
    public function colaboradorDepartamento()
    {
        $sql = 'SELECT count(Id_colaborador) as Colaborador, D.Departamento as Departamento FROM Colaborador as C INNER JOIN Municipio as M ON M.Id_municipio = C.Id_municipio INNER JOIN Departamento as D ON D.Id_departamento = M.Id_departamento GROUP BY D.Id_departamento';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    public function religion()
    {
        $sql = 'SELECT count(Id_colaborador) as Colaborador, Religion, ( ( count(Id_colaborador) * 100) / (select count(*) from Colaborador)) as Porcentaje FROM Colaborador as C INNER JOIN Religion as R ON C.Id_religion = R.Id_religion GROUP BY C.Id_religion';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    public function academico()
    {
        $sql = 'SELECT count(C.Id_colaborador) as Colaborador, Ca.Categoria as Categoria, ( ( count(C.Id_colaborador) * 100) / (select count(*) from Educacion)) as Porcentaje FROM Educacion as E INNER JOIN Colaborador as C ON C.Id_colaborador = E.Id_colaborador INNER JOIN Categoria as Ca ON Ca.Id_categoria = E.Id_categoria GROUP BY Ca.Categoria';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    public function cristian()
    {
        $sql = 'SELECT FROM Colaborador as C';
		$params = array(null);
		return Database::getRows($sql, $params);
    }

    public function municipioColaborador()
    {
        $sql = 'SELECT count(Id_colaborador) as Colaborador, M.municipio as municipio FROM Colaborador as C INNER JOIN Municipio as M ON M.Id_municipio = C.Id_municipio INNER JOIN Departamento as D ON D.Id_departamento = M.Id_departamento WHERE M.Id_departamento = ? GROUP BY M.Id_departamento';
		$params = array($this->Id_departamento);
		return Database::getRows($sql, $params);
    }

    public function generoGrafico()
    {
        $sql = "SELECT sum(Al.Sueldo_plaza) as Sueldo, A.Area as Area FROM Colaborador as C INNER JOIN Area_detalle as Ad ON C.Id_colaborador = Ad.Id_colaborador INNER JOIN Area_laboral as Al ON Ad.Id_laboral = Al.Id_laboral INNER JOIN Area as A ON A.Id_area = Al.Id_area WHERE C.Genero = ? GROUP BY A.Id_area";
        $params = array($this->Genero);
        return Database::getRows($sql, $params);
    }    
    
} 