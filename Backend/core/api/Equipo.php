<?php
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Equipo.php';

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $Equipo = new Equipo;
    $_SESSION['Id_usuario'] = 'Open';    
    $result = array('status' => 0, 'message' => null, 'exception' => null);    
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['Id_usuario'])) {
        switch ($_GET['action']) {

            case 'read':
                if ($result['dataset'] = $Equipo->readEquipo()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay equipo registrado';
                }
                break;

                case 'create':
                $_POST = $Equipo->validateForm($_POST);
                
                if ($Equipo->set($_POST['Nombre-equipoA'])) {
                    if ($Equipo->setApellidos($_POST['tipo-equipoA'])) {
                        if ($Equipo->createEquipo()) {
                            $result['status'] = 1;
                            $result['message'] = 'Equipo agregado correctamente';
                        }else{
                            $result['exception'] = 'Operacion fallida';
                        }    
                    }else{
                        $result['exception'] = 'Selecciona una opcion valida';
                    }
                }else{
                    $result['exception'] = 'Nombre equipo incorrecto';
                }
                break;

                case 'get':
                if ($Equipo->setId($_POST['Id_equipo'])) {
                    if ($result['dataset'] = $Equipo->geEquipo()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Equipo inexistente';
                    }
                } else {
                    $result['exception'] = 'Equipo incorrecto';
                }
                break;

                case 'update':
                    $_POST = $Equipo->validateForm($_POST);

                if ($Equipo->setId($_POST['Id_equipo'])){
                    if ($Equipo->getEquipo()){
                        if ($Equipo->setNombre_equipo($_POST['Nombre-equipoA'])) {
                            if ($Equipo->setId_tipo_equipo($_POST['tipo-equipoA'])){
                                if ($Equipo->updateEquipo()) {
                                $result['status'] = true;
                                $result['message'] = 'Equipo modificado correctamente';
                                }else{
                                    $result['exception'] = 'Operacion fallida';
                                }
                            }else{
                                $result['exception'] = 'Opción Invalida';
                            }    
                        }else{
                            $result['exception'] = 'Nombre incorrecto';
                        }   
                    }else{
                        $result['exception'] = 'Usuario inexistente';
                    }    
                }else{
                    $result['exception'] = 'Equipo incorrecto';
                }    
                        break;
                    
                case 'delete':
                    if ($_POST['identifier'] != $_SESSION['Id_equipo']) {
                        if ($Equipo->setId($_POST['identifier'])) {
                            if($Equipo->getEquipo()){
                                if($Equipo->deleteEquipo()){
                                    $result['status'] = 1;
                                    $result['message'] = 'Equipo eliminado correctamente';
                                }else{
                                    $result['exception'] = 'Operacion fallida';
                                }    
                            }else{
                                $result['exception'] = 'Equipo inexistente';
                            }    
                        }else{
                            $result['exception'] = 'Equipo incorrecto';
                        }    
                    }else{
                        $result['exception'] = 'No se puede eliminar a si mismo';
                    }    
                    break;
                
                }
            }

print(json_encode($result));
} else {
    exit('Recurso denegado');
}
?>