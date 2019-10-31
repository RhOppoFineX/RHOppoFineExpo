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
                $_POST = $Salud->validateForm($_POST);

                if($Salud->setEnfermedades_Tratamiento($_POST['Enfermedad-Tratamiento'])){
                    if($Salud->setDescripcion_enfermedades($_POST['Descripcion-Enfermedad'])){
                        if($Salud->setMedicamentos($_POST['Medicamentos'])){
                            if($Salud->setDescripcion_medicamentos($_POST['Descripcion-Medicamentos'])){
                                if($Salud->setAlergias($_POST['Alergias'])){
                                    if($Salud->setDescripcion_alergias($_POST['Descripcion-Alergias'])){
                                        if($Salud->setAlergias_medicamentos($_POST['Alergias-Medicamentos'])){
                                            if($Salud->setDescripcion_alergias_medicamentos($_POST['Descripcion-Alergias-Medicamentos'])){
                                                if($Salud->setId_colaborador($_POST['Colaborador'])){
                                                    if($Salud->createSalud()){
                                                        $result['status'] = true;
                                                        $result['message'] = 'Datos de salud insertados';
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Colaborador Inexistente';
                                                }
                                            } else {
                                                $result['exception'] = 'Descripción de Alergias a Medicamentos Invalida';
                                            }
                                        } else {
                                            $result['exception'] = 'Defina SI o NO en Alergias a Medicamentos';
                                        }
                                    } else {
                                        $result['exception'] = 'Descripción de Alergias no valida';
                                    }
                                } else {
                                    $result['exception'] = 'Defina SI o NO en Alergias';
                                }
                            } else {
                                $result['exception'] = 'Descripción de Medicamentos Invalida';
                            }
                        } else {
                            $result['exception'] = 'Defina SI o NO en Medicamentos';
                        }
                    } else {
                        $result['exception'] = 'Descripción de Enfermedades Invalida';
                    }
                } else {
                    $result['exception'] = 'Defina SI o NO en Enfermedad Tratamiento';
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