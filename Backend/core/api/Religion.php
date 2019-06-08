<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Religion.php';

if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $religion = new Religion();//Según sea la tabla que esten ocupando
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

?>