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
    //$_SESSION['Id_usuario'] = 'Jopen';Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
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

            case 'create':
            $_POST = $tipoUsuario->validateForm($_POST);

            if($tipoUsuario->setTipo($_POST['tipo-usuario-a'])){  
                if($tipoUsuario->insertTipoUsuario()){
                    $resultado['status'] = true;
                    $resultado['message'] = 'Tipo usuario insertado';
                }else{
                    $resultado['exception'] = 'Ocurrio un error';
                }
            }else{
                $resultado['exception'] = 'Longitud de caracteres invalida';
            }

         break;

         case 'get':
            if($tipoUsuario->setId($_POST['Id_tipo_usuario'])){
                if($resultado['dataset'] = $tipoUsuario->getTipoUsuarioModal()){
                    $resultado['status'] = true; 
                }else{                      
                    $resultado['exception'] = 'Id inexistente';
                }
            }else{
                $resultado['exception'] = 'Id incorrecto';
            }            

         break;

         case 'update':            
            $_POST = $tipoUsuario->validateForm($_POST);
            
            if($tipoUsuario->setId($_POST['Id-tipo-usuario'])){
                if($tipoUsuario->getTipoUsuarioModal()){
                    if($tipoUsuario->setTipo($_POST['tipo-usuario'])){
                        if($tipoUsuario->updateTipoUsuario()){
                            $resultado['status'] = true;
                            $resultado['message'] = 'Tipo usuario modificado';
                        }else{
                            $resultado['exception'] = 'Operación fallida';
                        }                                                
                    }else{
                        $resultado['exception'] = 'Longitud de caracteres invalida';                        
                    }
                }else{
                    $resultado['exception'] = 'No existe este registro';
                }
            }else{
                $resultado['exception'] = 'Id Inexistente';
            }
         break;

        case 'delete':
            if($tipoUsuario->setId($_POST['identifier'])){
                if($tipoUsuario->getTipoUsuarioModal()){
                    if($tipoUsuario->deleteTipoUsuario()){
                    $resultado['status'] = true;
                    $resultado['message'] = 'Tipo usuario eliminado';
                }else{
                    $resultado['exception'] = 'Registro no eliminado';
                }
            }else{
                $resultado['exception'] = 'Tipo usuario inexistente';
            }
        }else{
            $resultado['exception'] = 'Tipo usuario Incorrecto';
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