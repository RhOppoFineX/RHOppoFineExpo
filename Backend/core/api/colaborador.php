<?php 
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/colaborador.php';

if(isset($_GET['action'])){
    session_start();
    $colaborador = new Colaborador();
    $result = array('status' => false, 'message' => null, 'exception' => null);

    if(isset($_SESSION['Id_usuario'])){

        switch($_GET['action']){

            case 'search':
                $_POST = $colaborador->validateForm($_POST);

                if ($_POST['buscar_colaborador'] != '') {
                    if ($result['dataset'] = $colaborador->searchColaborador($_POST['buscar_colaborador'])) {
                        $result['status'] = true;
                        $rows = count($result['dataset']);
						if ($rows > 1) {
							$result['message'] = 'Se encontraron '.$rows.' coincidencias';
						} else {
							$result['message'] = 'Solo existe una coincidencia';
						}
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
            break;

            case 'read':
                if($result['dataset'] = $colaborador->readColaborador()){
                    $result['status'] = true;                               
                } else {
                    $result['exception'] = 'No hay colaboradores registrados';
                }                
            break;

            case 'create':
                $_POST = $colaborador->validateForm($_POST);
                
                    if($colaborador->setCodigo_colaborador($_POST['Codigo_colaborador'])){
                        if($colaborador->setNombres($_POST['Nombres'])){
                            if($colaborador->setApellidos($_POST['Apellidos'])){
                                if($colaborador->setGenero($_POST['Genero'])){
                                    if($colaborador->setId_religion($_POST['Religion'])){
                                        if($colaborador->setTelefono_casa($_POST['Telefono_casa'])){
                                            if($colaborador->setTelefono_celular($_POST['Telefono_celular'])){
                                                if($colaborador->setCorreo_institucional($_POST['Correo'])){
                                                    if($colaborador->setDireccion($_POST['Direccion'])){
                                                        if($colaborador->setNip($_POST['NIP'])){
                                                            if($colaborador->setNivel($_POST['Nivel'])){
                                                                if($colaborador->setEstudiando($_POST['Estudiando'])){                      
                                                                        if($colaborador->setEstado_colaborador(1)){//ver
                                                                            if($colaborador->setFecha_nacimiento($_POST['Fecha_nacimiento'])){
                                                                                if($colaborador->setId_municipio($_POST['Municipio'])){
                                                                                    if($colaborador->createColaborador()){
                                                                                        $result['status'] = true;
                                                                                        $result['message'] = 'Datos personales insertados continue con los datos de identificacion';
                                                                                        $_SESSION['Codigo_colaborador'] = $colaborador->getCodigo_colaborador();
                                                                                    } else {
                                                                                        $result['exception'] = 'Operación fallida';
                                                                                    }                                                               
                                                                                } else {    
                                                                                    $result['exception'] = 'Municipio incorrecto';
                                                                                }
                                                                            } else {
                                                                                $result['exception'] = 'Fecha invalida';
                                                                            }
                                                                        } else {
                                                                            $result['exception'] = 'valor invalido';
                                                                        }                                                                   
                                                                } else {
                                                                    $result['exception'] = 'Valor invalido';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Nivel incorrecto';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'NIP incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Dirección incorrecta';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Correo incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Telefono celular incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Telefono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Religion incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Genero incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['excpetion'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Codigo Incorrecto'; 
                    }               

            break;

            case 'get':
                if($colaborador->setId($_POST['Id_colaborador'])){
                    if($result['dataset'] = $colaborador->getColaborador()){
                        $result['status'] = true;
                    } else {
                        $result['exception'] = 'Colaborador Inexistente';
                    }
                } else {
                    $result['exception'] = 'Colaborador Incorrecto';
                }
            break;

            case 'update':
                $_POST = $colaborador->validateForm($_POST);   

                if($colaborador->setId($_POST['Id_colaborador_up'])){
                    if($colaborador->getColaborador()){
                        if($colaborador->setTelefono_casa($_POST['Telefono_casa_up'])){
                            if($colaborador->setTelefono_celular($_POST['Telefono_celular_up'])){
                                if($colaborador->setCorreo_institucional($_POST['Correo_up'])){
                                    if($colaborador->setDireccion($_POST['Direccion_up'])){
                                        if($colaborador->setId_religion($_POST['Religion_up'])){
                                            if($colaborador->setId_municipio($_POST['Municipio_up'])){
                                                if($colaborador->setNIP($_POST['NIP_up'])){
                                                    if($colaborador->setNivel($_POST['Nivel_up'])){
                                                        if($colaborador->setEstudiando($_POST['Estudiando_up'])){
                                                            if($colaborador->updateColaborador()){
                                                                $result['status'] = true;
                                                                $result['message'] = 'Datos personales actualizados';
                                                            } else {
                                                                $result['exception'] = 'Operación fallida';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Valor incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Nivel invalido';
                                                    }
                                                } else {
                                                    $result['exception'] = 'NIP incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Municipio Incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Religion no valida';
                                        }
                                    } else {
                                        $result['exception'] = 'Direccion no valida';
                                    }
                                } else {
                                    $result['exception'] = 'Correo no valido';
                                }
                            } else {
                                $result['exception'] = 'Número invalido';
                            }
                        }  else {
                            $result['exception'] = 'Número invalido';
                        }                      
                    } else {
                        $result['exception'] = 'Colaborador inexistente';
                    }
                } else {
                    $result['exception'] = 'Colaborador incorrecto';
                }
            break;            

            case 'disable':
                if($colaborador->setId($_POST['identifier'])){
                    if($colaborador->setEstado_colaborador(0)){
                        if($colaborador->getColaborador()){
                            if($colaborador->disableColaborador()){
                                $result['status'] = true;
                                $result['message'] = 'Colaborador Deshablitado';
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
