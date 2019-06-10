<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/nivel-idioma.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset
if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $nivelidioma = new nivelIdioma();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    //Se verifica si existe una sesión iniciada antes de proceder
    //El switch case evalua que opcion del crud va a ejecutar
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

         case 'read':                          //metodo del modelo 
            if($resultado['dataset'] = $nivelidioma->selectnivelIdioma()){
                $resultado['status'] = true;                
            } else {
                $resultado['exception'] = 'No se han registrado Idiomas';
            }
         break;


         case 'create':
            $_POST = $nivelidioma->validateForm($_POST);

            if($nivelidioma->setnivelidioma($_POST['nivelIdioma'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                if($nivelidioma->insertnivelidioma()){  //operación insertar del modelo
                    $resultado['status'] = true;
                    $resultado['message'] = 'nivel idioma insertada';
                }else{
                    $resultado['exception'] = 'Hubo un error';
                }
            }else{
                $resultado['exception'] = 'Longitud de caracteres invalida';
            }

         break;
            //el get es primero despues el update para no confundirse 
         case 'get':
            if($nivelidioma->setId($_POST['Id_nivel_idioma'])){
                if($resultado['dataset'] = $nivelidioma->getnivelIdiomaModal()){
                    $resultado['status'] = true;                
                }else{
                    $resultado['exception'] = 'Id inexistente';
                }
            }else{
                $resultado['exception'] = 'Id incorrecto';
            }            

         break;
         
         case 'update':            
            $_POST = $nivelidioma->validateForm($_POST);
            
            if($nivelidioma->setId($_POST['Id_nivel_idioma'])){//es el id del input en el formulario que correponde, si hay mas campos mas if
                if($nivelidioma->getnivelidiomaModal()){
                    if($nivelidioma->setnivelidioma($_POST['idioma'])){
                        if($nivelidioma->updatenivelidioma()){
                            $resultado['status'] = true;
                            $resultado['message'] = 'nivel Idioma modificada';
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
            if($nivelidioma->setId($_POST['identifier'])){
                if($nivelidioma->getnivelidiomaModal()){
                    if($nivelidioma->deletenivelIdioma()){
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