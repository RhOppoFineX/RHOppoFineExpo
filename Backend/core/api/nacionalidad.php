<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/nacionalidad.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset
if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $nacionalidad = new nacionalidad();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    //Se verifica si existe una sesión iniciada antes de proceder
    //El switch case evalua que opcion del crud va a ejecutar
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

         case 'read':                          //metodo del modelo 
            if($resultado['dataset'] = $nacionalidad->selectnacionalidad()){
                $resultado['status'] = true;                
            } else {
                $resultado['exception'] = 'No se han registrado Idiomas';
            }
         break;


         case 'create':
            $_POST = $nacionalidad->validateForm($_POST);

            if($nacionalidad->setnacionalidad($_POST['nacionalidad'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                if($nacionalidad->insertnacionalidad()){  //operación insertar del modelo
                    $resultado['status'] = true;
                    $resultado['message'] = 'nivel nacionalidad insertada';
                }else{
                    $resultado['exception'] = 'Hubo un error';
                }
            }else{
                $resultado['exception'] = 'Longitud de caracteres invalida';
            }

         break;
            //el get es primero despues el update para no confundirse 
         case 'get':
            if($nacionalidad->setId($_POST['Id_nacionalidad'])){
                if($resultado['dataset'] = $nacionalidad->getnacionalidadModal()){
                    $resultado['status'] = true;                
                }else{
                    $resultado['exception'] = 'Id inexistente';
                }
            }else{
                $resultado['exception'] = 'Id incorrecto';
            }            

         break;
         
         case 'update':            
            $_POST = $nacionalidad->validateForm($_POST);
            
            if($nacionalidad->setId($_POST['id_nacionalidad'])){//es el id del input en el formulario que correponde, si hay mas campos mas if
                if($nacionalidad->getnacionalidadModal()){
                    if($nacionalidad->setnacionalidad($_POST['nacionalidad'])){
                        if($nacionalidad->updatenacionalidad()){
                            $resultado['status'] = true;
                            $resultado['message'] = 'nivel nacionalidad modificada';
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
            if($nacionalidad->setId($_POST['identifier'])){
                if($nacionalidad->getnacionalidadModal()){
                    if($nacionalidad->deletenacionalidad()){
                        $resultado['status'] = true;
                        $resultado['message'] = 'nacionalidad eliminada';
                    }else{
                        $resultado['exception'] = 'Registro no eliminado';
                    }
                }else{
                    $resultado['exception'] = 'nacionalidad inexistente';
                }
            }else{
                $resultado['exception'] = 'nacionalidad Incorrecta';
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