<?php
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/idioma.php';

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $idioma = new idioma;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    $_SESSION['id_idioma'] = 'Jopen';
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['id_idioma'])) {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $idioma->readidioma()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay idiomas registrados';
                }
                break;

            case 'create':
                $_POST = $idioma->validateForm($_POST);

                    if($idioma->setidioma($_POST['Idioma-A'])){
                        if($idioma->setnivel($_POST['Nivel-A'])){
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

                if($idioma->setidioma($_POST['idioma'])){
                    if($idioma->setnivel($_POST['nivel'])){
                        if ($idioma->updateidioma()) {
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
            
                case 'delete':
                if ($_POST['identifier'] != $_SESSION['id_idioma']) {
                    if ($idioma->setId($_POST['identifier'])) {
                        if ($idioma->getidioma()) {
                            if ($idioma->deleteidioma()) {
                                $result['status'] = 1;
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
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                exit('Acción no disponible log');
        }
    } 
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
