<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Area.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset
if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    //$_SESSION['Id_usuario'] = 'Jopen';Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $area = new Area();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    //Se verifica si existe una sesión iniciada antes de proceder
    //El switch case evalua que opcion del crud va a ejecutar
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

         case 'read':                          //metodo del modelo 
            if($resultado['dataset'] = $area->selectArea()){
                $resultado['status'] = true;                
            } else {
                $resultado['exception'] = 'No se han registrado Areas';
            }
         break;


         case 'create':
            $_POST = $area->validateForm($_POST);

            if($area->setArea($_POST['AreaID'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                if($area->insertArea()){  //operación insertar del modelo
                    $resultado['status'] = true;
                    $resultado['message'] = 'Area insertada';
                }else{
                    $resultado['exception'] = 'Hubo un error';
                }
            }else{
                $resultado['exception'] = 'Longitud de caracteres invalida';
            }

         break;
            //el get es primero despues el update para no confundirse 
         case 'get':
            if($area->setId($_POST['Id_area'])){
                if($resultado['dataset'] = $area->getAreaModal()){
                    $resultado['status'] = true;
                }else{
                    $resultado['exception'] = 'Id inexistente';
                }
            }else{
                $resultado['exception'] = 'Id incorrecto';
            }            

         break;
         
         case 'update':            
            $_POST = $area->validateForm($_POST);
            
            if($area->setId($_POST['Id_area'])){//es el id del input en el formulario que correponde, si hay mas campos mas if
                if($area->getAreaModal()){
                    if($area->setArea($_POST['Area'])){
                        if($area->updateArea()){
                            $resultado['status'] = true;
                            $resultado['message'] = 'Area modificada';
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
            if($area->setId($_POST['identifier'])){
                if($area->getAreaModal()){
                    if($area->deleteArea()){
                        $resultado['status'] = true;
                        $resultado['message'] = 'Area eliminada';
                    }else{
                        $resultado['exception'] = 'Registro no eliminado';
                    }
                }else{
                    $resultado['exception'] = 'Area inexistente';
                }
            }else{
                $resultado['exception'] = 'Area Incorrecta';
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