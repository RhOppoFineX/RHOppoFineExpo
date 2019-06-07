<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Religion.php';

if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION
    session_start();

    $religion = new Religion();
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    //Se verifica si existe una sesión iniciada antes de proceder

    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){
         case 'read':
            if($resultado['dataset'] = $religion->selectReligion()){
                $resultado['status'] = true;
            } else {
                $resultado['exception'] = 'No se han registrado Religiones';
            }
         break;

         default:
            exit('Acción no disponible');
         
     }
     //Devolvemos la informacion ($resultado) pero la convertimos a formato JSON
        print(json_encode($resultado));

    } else {
        exit('Debes Iniciar Sesión antes');
    }

} else {
    exit('Recurso denegado');
}
