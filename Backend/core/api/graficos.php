<?php

//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/graficos.php';

if(isset($_GET['action']))
{
    session_start();
    $graficos = new graficos();
    $resultado = array('status' => false, 'message' => null, 'exception' => null); 

    if(isset($_SESSION['Id_usuario']))
    {
        switch ($_GET['action']){

            case 'ejemplo':
                if($resultado['dataset'] = $graficos->ejemplo()){
                    $resultado['status'] = true;
                } else {
                    $resultado['exception'] = 'Uhhhhh';
                }
            break;
                
        }

        print(json_encode($resultado));
    } else {
        exit('Debes Iniciar Sesión antes');
    }

} else {
    exit('Recurso denegado');
} 

