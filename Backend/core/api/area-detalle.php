<?php
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/area-detalle.php';

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $area_detalle = new Area_detalle;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //$_SESSION['Id_usuario'] = 'Jopen';        
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['Id_usuario'])) {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $area_detalle->readarea_detalle()) {
                    $result['status'] = true;
                } else {
                    $result['exception'] = 'No hay idiomas registrados'; 
                }
                break;
            
            case 'create':
                $_POST = $area->validateForm($_POST);
    
                if($area->setArea($_POST['#'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                    if($area->insertArea()){  //operación insertar del modelo
                        $resultado['status'] = true;
                        $resultado['message'] = 'Detalle insertada';
                    }else{
                        $resultado['exception'] = 'Hubo un error';
                    }
                }else{
                    $resultado['exception'] = 'Longitud de caracteres invalida';
                }
            break;

            case 'update':            
            $_POST = $area_detalle->validateForm($_POST);
            
            if($area_detalle->setId($_POST['Id_area_detalle'])){//es el id del input en el formulario que correponde, si hay mas campos mas if
                if($area_detalle->getAreaModal()){
                    if($area_detalle->setId_laboral($_POST['Area'])){
                        if($area_detalle->updatearea_detalle()){
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

                default:
                exit('Acción no disponible log');
        }
        print(json_encode($result));
    }else{
        exit('Debes Iniciar Sesión antes');
    } 
	
} else {
	exit('Recurso denegado');
}
?>