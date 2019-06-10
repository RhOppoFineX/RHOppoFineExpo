<?php

//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/tipoUsuario.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset

if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $tipoUsuario = new tipoUsuario();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    if(isset($_SESSION['Id_usuario'])){

        switch ($_GET['action']){

            case 'read':
                if($resultado['dataset'] = $tipoUsuario->selectTipoUsuario()){
                    $resultado['status'] = true;
                }else{
                    $resultado['exception'] = 'No se han registrado tipos de usuarios';
                }
            break;
        }


        print(json_encode($resultado));

    }else{
        exit('Debes Iniciar Sesión antes');
    }

}else{

    exit('Recurso denegado');
}

?>