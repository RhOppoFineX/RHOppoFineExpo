<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/idioma.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset
if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $idioma = new Idioma();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    //Se verifica si existe una sesión iniciada antes de proceder
    //El switch case evalua que opcion del crud va a ejecutar
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

         case 'read':                          //metodo del modelo 
            if($resultado['dataset'] = $idioma->selectIdioma()){
                $resultado['status'] = true;                
            } else {
                $resultado['exception'] = 'No se han registrado Idiomas';
            }
         break;


         case 'create':
            $_POST = $idioma->validateForm($_POST);

            if($idioma->setidioma($_POST['idioma'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                if($idioma->insertidioma()){  //operación insertar del modelo
                    $resultado['status'] = true;
                    $resultado['message'] = 'idioma insertada';
                }else{
                    $resultado['exception'] = 'Hubo un error';
                }
            }else{
                $resultado['exception'] = 'Longitud de caracteres invalida';
            }

         break;
            //el get es primero despues el update para no confundirse 
         case 'get':
            if($idioma->setId($_POST['Id_idioma'])){
                if($resultado['dataset'] = $idioma->getIdiomaModal()){
                    $resultado['status'] = true;                
                }else{
                    $resultado['exception'] = 'Id inexistente';
                }
            }else{
                $resultado['exception'] = 'Id incorrecto';
            }            

         break;
         
         case 'update':            
            $_POST = $idioma->validateForm($_POST);
            
            if($idioma->setId($_POST['Id_idioma'])){//es el id del input en el formulario que correponde, si hay mas campos mas if
                if($idioma->getidiomaModal()){
                    if($idioma->setidioma($_POST['idioma'])){
                        if($idioma->updateidioma()){
                            $resultado['status'] = true;
                            $resultado['message'] = 'Idioma modificada';
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
            if($idioma->setId($_POST['identifier'])){
                if($idioma->getidiomaModal()){
                    if($idioma->deleteIdioma()){
                        $resultado['status'] = true;
                        $resultado['message'] = 'idioma eliminada';
                    }else{
                        $resultado['exception'] = 'Registro no eliminado';
                    }
                }else{
                    $resultado['exception'] = 'idioma inexistente';
                }
            }else{
                $resultado['exception'] = 'idioma Incorrecta';
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