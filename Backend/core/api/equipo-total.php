<?php
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/equipo-total.php';

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $Equipo = new Equipo;
     //$_SESSION['Id_usuario'] = 'Open';    
    $result = array('status' => 0, 'message' => null, 'exception' => null);    
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['Id_usuario'])) {
        switch ($_GET['action']) {

            case 'read':
                if(isset($_SESSION['Id_colaborador'])){
                    if ($result['dataset'] = $Equipo->readEquipoTotalFiltrado($_SESSION['Id_colaborador'])) {
                        $result['status'] = true;
                    } else {
                        $result['exception'] = 'No hay equipo registrado';
                    }
                } else {
                    if ($result['dataset'] = $Equipo->readEquipoTotal()) {
                        $result['status'] = true;
                    } else {
                        $result['exception'] = 'No hay equipo registrado';
                    }
                }
            break;

            case 'create':
                $_POST = $Equipo->validateForm($_POST);
                
                if ($Equipo->setId_equipo($_POST['nombre'])) {
                    if ($Equipo->setId_colaborador($_POST['Tipo-equipo-A'])) {
                        if ($Equipo->createEquipo()) {
                            $result['status'] = true;
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
                if ($Equipo->setId($_POST['Id_equipo_total'])) {
                    if ($result['dataset'] = $Equipo->getEquipo()) {
                        $result['status'] = true;
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
                        if ($Equipo->setId_equipo($_POST['equipo'])) {
                            if ($Equipo->setId_colaborador($_POST['nombrecol'])){
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
                    
                case 'disable':
                    if ($Equipo->setId($_POST['identifier'])) {
                        if ($Equipo->getEquipo()) {
                            if($Equipo->setEstado(0)){
                                if ($Equipo->disableEquipo()){
                                    $result['status'] = true;
                                    $result['message'] = 'Equipo deshabilitado correctamente';
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = 'Estado Invalido';
                            }
                        } else {
                            $result['exception'] = 'Equipo inexistente';
                        }
                    } else {
                        $result['exception'] = 'Equipo incorrecto';
                    }
                                            
                break;
                

        }
        print(json_encode($result));
    } else {
        exit('Debe Iniciar Sesión Antes');
    }

} else {
    exit('Recurso denegado');
}
?>