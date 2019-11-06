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
                if($Salud->setId_salud($_POST['Id_Salud'])){
                    if($result['dataset'] = $Salud->getSalud()){
                        $result['status'] = true;
                    } else {
                        $result['exception'] = 'Datos Inexistente';
                    }
                } else {
                    $result['exception'] = 'Datos Incorrectos';
                }
            break;

            case 'update':
                $_POST = $Salud->validateForm($_POST);

                if($Salud->setId_salud($_POST['Id_salud'])){
                    if($Salud->setEnfermedades_Tratamiento($_POST['Enfermedad-Tratamiento-up'])){
                        if($Salud->setDescripcion_enfermedades($_POST['Descripcion-Enfermedad-up'])){
                            if($Salud->setMedicamentos($_POST['Medicamentos-up'])){
                                if($Salud->setDescripcion_medicamentos($_POST['Descripcion-Medicamentos-up'])){
                                    if($Salud->setAlergias($_POST['Alergias-up'])){
                                        if($Salud->setDescripcion_alergias($_POST['Descripcion-Alergias-up'])){
                                            if($Salud->setAlergias_medicamentos($_POST['Alergias-Medicamentos-up'])){
                                                if($Salud->setDescripcion_alergias_medicamentos($_POST['Descripcion-Alergias-Medicamentos-up'])){
                                                    if($Salud->updateSalud()){
                                                        $result['status'] = true;
                                                        $result['message'] = 'Datos de salud Actualizados';
                                                    } else {
                                                        $result['exception'] = 'Operación Fallida';
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

                } else {
                    $result['exception'] = 'Id Incorrecto';
                }                              
                
            break;            

            case 'disable':
                if($Salud->setId_salud($_POST['identifier'])){
                    if($Salud->setEstado(0)){
                        if($Salud->getSalud()){
                            if($Salud->disable()){
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