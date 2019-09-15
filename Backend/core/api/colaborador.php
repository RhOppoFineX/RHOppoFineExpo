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
