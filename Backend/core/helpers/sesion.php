<?php
class Session {
    

    public static function iniSession()
    {
        session_start();//Nos da acceso a todas las variables de Sesión

        if(isset($_SESSION['Id_usuario'])){

            $filename = basename($_SERVER['PHP_SELF']);          
        
            if($filename === 'index.php' || $filename === 'register.php')
                header('Location: charts.php');      
        
        } else {
        
            $filename = basename($_SERVER['PHP_SELF']);
        
            if($filename != 'index.php')
                header('Location: index.php');          
        }

    }

    public static function verifcarPrivilegio()
    {
        $retorno = false;
        $array = $_SESSION["Tipo_usuario_privilegios"];
        foreach($array as $value)
        {
            if($value === $_SESSION['Tipo_usuario'])
                $retorno = true;            
                 
        }       

        if(!$retorno)
            header('Location: cerrar.php');

    }

}


