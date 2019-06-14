<?php
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/idioma.php';

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $idioma = new idioma;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //$_SESSION['Id_usuario'] = 'Jopen';
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['Id_usuario'])) {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $idioma->readidioma()) {
                    $result['status'] = true;
                } else {
                    $result['exception'] = 'No hay idiomas registrados';
                }
                break;

            case 'create':
                $_POST = $idioma->validateForm($_POST);

                    if($idioma->setidioma($_POST['Idioma-A'])){
                        if($idioma->setId_nivel_idioma($_POST['Nivel-A'])){
                            if ($idioma->createidioma()) {
                                $result['status'] = 1;
                                $result['message'] = 'creado correctamente';
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }else{
                            $result['exception'] = 'ingrese un idioma valido';
                        }
                     }
                     else{
                        $result['exception'] = 'ingrese un nivel valido';
                     }

             
                break;
            case 'get':
                if ($idioma->setId($_POST['Id_idioma'])) {
                    if ($result['dataset'] = $idioma->getidiomaModal()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'idioma inexistente';
                    }
                } else {
                    $result['exception'] = 'idioma incorrecto';
                }
                break;
           
            case 'update':
                $_POST = $idioma->validateForm($_POST);
                
                if($idioma->setId($_POST['Id_idioma'])){
                    if($idioma->getidiomaModal()){
                        if($idioma->setidioma($_POST['idioma'])){
                            if($idioma->setId_nivel_idioma($_POST['nivel'])){
                                if ($idioma->updateidioma()) {
                                    $result['status'] = true;
                                    $result['message'] = 'Modificado correctamente';
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            }else{
                                $result['exception'] = 'ingrese un idioma valido';
                            }
                         }
                         else{
                            $result['exception'] = 'ingrese un nivel valido';
                         }
                    }else{
                        $result['exception'] = 'idioma inexistente';
                    }                    
                }else{
                    $result['exception'] = 'Id no valido';
                }    
            break;
            
                case 'delete':
                
                    if ($idioma->setId($_POST['identifier'])) {
                        if ($idioma->getidiomaModal()) {
                            if ($idioma->deleteidioma()) {
                                $result['status'] = true;
                                $result['message'] = 'idioma eliminado correctamente';
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'idioma inexistente';
                        }
                    } else {
                        $result['exception'] = 'idioma incorrecto';
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
