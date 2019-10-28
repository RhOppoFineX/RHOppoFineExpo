<?php 
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/datos-identificacion.php';

if(isset($_GET['action'])){
    session_start();
    $Datos = new Datos();
    $result = array('status' => false, 'message' => null, 'exception' => null);

    if(isset($_SESSION['Id_usuario'])){

        switch($_GET['action']){
            case 'read':
                if(isset($_SESSION['Id_colaborador'])){
                    if($result['dataset'] = $Datos->readDatosFiltrados($_SESSION['Id_colaborador'])){
                        $result['status'] = true;                               
                    } else {
                        $result['exception'] = 'No hay Datos registrados';
                    }
                } else {                    
                    if($result['dataset'] = $Datos->readDatos()){
                        $result['status'] = true;                               
                    } else {
                        $result['exception'] = 'No hay Datos registrados';
                    }
                } 
                break;
                
            case 'create':
                $_POST = $Datos->validateForm($_POST);
                
                    if($Datos->setNum_documento($_POST['NumeroDocumento'])){
                        if($Datos->setResidencia($_POST['Direccion'])){
                            if($Datos->setLugar_expedicion($_POST['LugarExpedicion'])){
                                if($Datos->setFecha_expedicion($_POST['FechaExpedicion'])){
                                    if($Datos->setProfesion($_POST['Profesion'])){
                                        if($Datos->setId_estado_civil($_POST['Estado_civil'])){
                                            if($Datos->setFecha_expiracion($_POST['FechaExpiracion'])){
                                                if($Datos->setNumero_ISSS($_POST['NumeroISSS'])){
                                                    if($Datos->setAFP($_POST['AFP'])){
                                                        if($Datos->setNUP($_POST['NUP'])){            
                                                            if($Datos->setDUI($_POST['DUI'])){//ver
                                                                if($Datos->setId_colaborador($_POST['Colaborador'])){
                                                                    if($Datos->createDatos()){
                                                                            $result['status'] = true;
                                                                            $result['message'] = 'Datos personales insertados continue con los datos de identificacion';
                                                                            } else {
                                                                                $result['exception'] = 'Fecha invalida';
                                                                            }
                                                                        } else {
                                                                            $result['exception'] = 'valor invalido';
                                                                        }                                                                   
                                                                } else {
                                                                    $result['exception'] = 'Tipo invalido';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'NUP incorrecto';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'AFP incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'ISSS incorrecta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Fecha de Expiracion incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Estado incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Profesion incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'fecha de expedicion incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Lugar de expedicion incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Direccion incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Numero de documento inconrrecto';
                        }             

            break;

            case 'get':
                if($Datos->setId($_POST['Id_Datos'])){
                    if($result['dataset'] = $Datos->getDatos()){
                        $result['status'] = true;
                    } else {
                        $result['exception'] = 'Datos Inexistente';
                    }
                } else {
                    $result['exception'] = 'Datos Incorrecto';
                }
            break;

            case 'update':
                $_POST = $Datos->validateForm($_POST);   

                if($Datos->setId($_POST['Id_datos_identificacion'])){
                    if($Datos->getDatos()){
                        if($Datos->setResidencia($_POST['Direccion_up'])){
                            if($Datos->setFecha_expiracion($_POST['FechaExpiracion-up'])){
                                if($Datos->setId_estado_civil($_POST['Estado_civil_up'])){
                                    if($Datos->updateDatos()){
                                        $result['status'] = true;
                                        $result['message'] = 'Datos modificados';
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                } else {
                                    $result['exception'] = 'Estado civil no valido';
                                }
                            } else {
                                $result['exception'] = 'Fecha no valida';
                            }
                        } else {
                            $result['exception'] = 'Direc. Residencial incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Colaborador Inexistente';
                    }
                } else {
                    $result['exception'] = 'Datos incorrectos';
                }
            break;            

            case 'disable':
                if($Datos->setId($_POST['identifier'])){
                    if($Datos->setEstado(0)){
                        if($Datos->getDatos()){
                            if($Datos->disableDatos()){
                                $result['status'] = true;
                                $result['message'] = 'Datos de colaborador Deshablitados';
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Colaborador Inexistente';
                        }
                    } else {
                        $result['exception'] = 'Estado Incorrecto';
                    }
                } else {
                    $result['exception'] = 'Colaborador Incorrecto';
                }
            break;
            
            default:
                exit('Acción no disponible');            
            
        }

        print(json_encode($result));

    } else {
        exit('Debes Iniciar Sesión antes');
    }
} else {
    exit('Recurso denegado');
}