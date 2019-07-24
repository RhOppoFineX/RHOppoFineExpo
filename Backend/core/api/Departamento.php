<?php
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Departamento.php';

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $departamento = new Departamento;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //$_SESSION['Id_usuario'] = 'Jopen';        
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['Id_usuario'])) {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $departamento->readdepartamento()) {
                    $result['status'] = true;
                } else {
                    $result['exception'] = 'No hay idiomas registrados'; 
                }
                break;

            case 'create':
                $_POST = $departamento->validateForm($_POST);

                    if($departamento->setdepartamento($_POST['Departamento-A'])){
                        if($departamento->setId_nacionalidad($_POST['Nacionalidad-A'])){
                            if ($departamento->createdepartamento()) {
                                $result['status'] = 1;
                                $result['message'] = 'creado correctamente';
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        }else{
                            $result['exception'] = 'ingrese un departamento valido';
                        }
                     }
                     else{
                        $result['exception'] = 'ingrese una nacionaliadad valida';
                     }

             
                break;
            case 'get':
                if ($departamento->setId($_POST['Id_departamento'])) {
                    if ($result['dataset'] = $departamento->getdepartamentoModal()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Departamento inexistente';
                    }
                } else {
                    $result['exception'] = 'Departamento incorrecto';
                }
                break;
           
            case 'update':
                $_POST = $departamento->validateForm($_POST);
                
                if($departamento->setId($_POST['Id_departamento'])){
                    if($departamento->getdepartamentoModal()){
                        if($departamento->setdepartamento($_POST['Departamento-B'])){
                            if($departamento->setId_nacionalidad($_POST['Nacionalidad-B'])){
                                if ($departamento->updatedepartamento()) {
                                    $result['status'] = true;
                                    $result['message'] = 'Modificado correctamente';
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            }else{
                                $result['exception'] = 'ingrese un departamento valido';
                            }
                         }
                         else{
                            $result['exception'] = 'ingrese una nacionalidad valida';
                         }
                    }else{
                        $result['exception'] = 'Departamento inexistente';
                    }                    
                }else{
                    $result['exception'] = 'Id no valido';
                }    
            break;
            
                case 'delete':
                
                    if ($departamento->setId($_POST['identifier'])) {
                        if ($departamento->getdepartamentoModal()) {
                            if ($departamento->deletedepartamento()) {
                                $result['status'] = true;
                                $result['message'] = 'Departamento eliminado correctamente';
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Departamento inexistente';
                        }
                    } else {
                        $result['exception'] = 'Departamento incorrecto';
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