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
                if ($result['dataset'] = $area_detalle->readArea_detalle()) {
                    $result['status'] = true;
                } else {
                    $result['exception'] = 'No hay idiomas registrados'; 
                }
                break;
                
                case 'get':
                if ($area_detalle->setId($_POST['Id_area_detalle'])) {
                    if ($result['dataset'] = $area_detalle->getArea_detalle()) {
                        $result['status'] = true;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            
            case 'create':
                $_POST = $area_detalle->validateForm($_POST);
    
                if($area_detalle->setId_laboral($_POST['LaboralA'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                    if($area_detalle->setId_colaborador($_POST['ColaboradorA'])){
                        if($area_detalle->createArea_detalle()){  //operación insertar del modelo
                            $resultado['status'] = true;
                            $resultado['message'] = 'Detalle insertada';
                        }else{
                            $resultado['exception'] = 'Hubo un error';
                        }
                    }else{
                        $resultado['exception'] = 'Longitud de caracteres invalidos';
                    }
                }else{
                    $resultado['exception'] = 'Longitud de caracteres invalida';
                }
            break;

            case 'update':            
            $_POST = $area_detalle->validateForm($_POST);
            
            if($area_detalle->setId($_POST['Id_area_detalle'])){//es el id del input en el formulario que correponde, si hay mas campos mas if
                if($area_detalle->getArea_detalle()){
                    if($area_detalle->setId_laboral($_POST['LaboralB'])){
                        if($area_detalle->setId_colaborador($_POST['ColaboradorB'])){
                            if($area_detalle->updateArea_detalle()){
                                $resultado['status'] = true;
                                $resultado['message'] = 'Area modificada';
                            }else{
                                $resultado['exception'] = 'Operación fallida';
                            }
                        }else{
                            $resultado['exception'] = 'Longitud de caracteres invalida';
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
            if ($_POST['identifier'] != $_SESSION['Id_area_detalle']) {
                if ($usuario->setId($_POST['identifier'])) {
                    if ($usuario->getArea_detalle()) {
                        if ($usuario->deleteArea_detalle()) {
                            $result['status'] = true;
                            $result['message'] = 'Usuario eliminado correctamente';
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
            } else {
                $result['exception'] = 'No se puede eliminar a sí mismo';
            }
            break;

            case 'disable':
                if($_POST['identifier'] != $_SESSION['Id_area_detalle']){
                    if($usuario->setId($_POST['identifier'])){
                        if($usuario->setEstado(0)){
                            if($usuario->getArea_detalle()){
                                if($usuario->disableArea_detalle()){
                                    $result['status'] = true;
                                    $result['message'] = 'Usuario deshabilitado correctamente';
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = 'Usuario inexistente';
                            }
                        } else {
                            $result['exception'] = 'Estado incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Usuario Incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede deshabilitar a sí mismo';
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