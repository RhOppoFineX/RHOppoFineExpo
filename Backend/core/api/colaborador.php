<?php 
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../helpers/database.php';

if(isset($_GET['action'])){
    session_start();
    $colaborador = new Colaborador();
    $result = array('status' => false, 'message' => null, 'exception' => null);

    if(isset($_SESSION['Id_usuario'])){

        switch($_GET['acttion']){
            case 'read':
                if($colaborador->readColaborador()){
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
                                    if($colaborador->setTelefono_casa($_POST['Telefono-casa'])){
                                        if($colaborador->setTelefono_celular($_POST['Telefono-celular'])){
                                            if($colaborador->setCorreo_institucional($_POST['Correo'])){
                                                if($colaborador->setDireccion($_POST['Direccion'])){
                                                    if($colaborador->setNip($_POST['NIP'])){
                                                        if($colaborador->setNivel($_POST['Nivel'])){
                                                            if($colaborador->setEstudiando($_POST['Estudiando'])){
                                                                if($colaborador->setFecha_ingreso($_POST['Fecha-ingreso'])){//ver
                                                                    if($colaborador->setEstado_colaborador($_POST['Estado'])){//ver
                                                                        if($colaborador->setFecha_nacimiento($_POST['Fecha-nacimiento'])){
                                                                            if($colaborador->setId_municipio($_POST['Municipio'])){
                                                                                
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
                                                                    $result['exception'] = 'Fecha invalida';
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
                        $result['exceotion'] = 'Colaborador Inexistente';
                    }
                } else {
                    $result['exception'] = 'Colaborador Incorrecto';
                }
            break;

            case 'disable':
                if($colaborador->setId($_POST['identifier'])){
                    if($colaborador->setEstado_colaborador()){
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
