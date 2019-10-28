<?php 
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/salud.php';

if(isset($_GET['action'])){
    session_start();
    $Salud = new Salud();
    $result = array('status' => false, 'message' => null, 'exception' => null);

    if(isset($_SESSION['Id_usuario'])){

        switch($_GET['action']){
            case 'read':               
                    if($result['dataset'] = $Salud->readSalud()){
                        $result['status'] = true;                               
                    } else {
                        $result['exception'] = 'No hay Datos registrados';
                    }              

            break;

            case 'create':
                $_POST = $Datos->validateForm($_POST);

                if($Datos->setNombres($_POST['Nombres'])){
                    if($Datos->setApellidos($_POST['Apellidos'])){
                        if($Datos->setFecha($_POST['Fecha-Nacimiento'])){
                            if($Datos->setDependiente($_POST['Dependiente'])){
                                if($Datos->setId_parentesco($_POST['Parentesco'])){
                                    if($Datos->setId_colaborador($_POST['Colaborador'])){
                                        if($Datos->setGenero($_POST['Genero'])){
                                            if($Datos->setTelefono($_POST['Telefono'])){
                                                if($Datos->setEstado(1)){
                                                    if($Datos->createDatosFamiliares()){
                                                        $result['status'] = true;
                                                        $result['message'] = 'Familiar Insertado';
                                                    } else {
                                                        $result['exception'] = 'No se pudo insertar';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Estado incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Telefono no valido';
                                            }
                                        } else {
                                            $result['exception'] = 'Genero Invalido';
                                        }
                                    } else {
                                        $result['exception'] = 'Colaborador invalido';
                                    }
                                } else {
                                    $result['exception'] = 'Parentesco incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Estado de dependencia incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Fecha de nacimiento Invalida';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }                    
                } else {
                    $result['exception'] = 'Nombres Incorrectos';
                }                                       
                                

            break;

            case 'get':
                if($Datos->setId($_POST['Id_datos_familiares'])){
                    if($result['dataset'] = $Datos->getDatosFamiliares()){
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

                if($Datos->setId($_POST['Id-familiar-up'])){
                    if($Datos->getDatosFamiliares()){
                        if($Datos->setDependiente($_POST['Dependiente-up'])){
                            if($Datos->setTelefono($_POST['Telefono-up'])){
                                if($Datos->updateDatosFamiliares()){
                                    $result['status'] = true;
                                    $result['message'] = 'Datos actualizados';
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = 'Telefono incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Valor de dependencia no valido';
                        }
                    } else {
                        $result['exception'] = 'Datos Inexistentes';
                    }
                } else {
                    $result['exception'] = 'Id incorrecto';
                }
                
            break;            

            case 'disable':
                if($Datos->setId($_POST['identifier'])){
                    if($Datos->setEstado(0)){
                        if($Datos->getDatosFamilliares()){
                            if($Datos->disableDatos()){
                                $result['status'] = true;
                                $result['message'] = 'Datos de colaborador Deshablitado';
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
            
        }

        print(json_encode($result));

    } else {
        exit('Debes Iniciar Sesión antes');
    }
} else {
    exit('Recurso denegado');
}