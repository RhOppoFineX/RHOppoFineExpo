<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Municipio.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset
if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    $municipio = new Municipio();
    $result = array('status' => 0, 'message'=> null, 'exception' => null);
    $_SESSION['Id_usuario'] = 'Jopen';

    //Se verifica si existe una sesión iniciada antes de proceder
    //El switch case evalua que opcion del crud va a ejecutar
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

        case 'read':
            if ($result['dataset'] = $municipio->readMunicipios()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay municipios registrados';
            }
            break;

         case 'create':
            $_POST = $municipio->validateForm($_POST);

            if($municipio->setMunicipio($_POST['MunicipioID2'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                if($municipio->setIdDepartamento($_POST['Departamento2'])){            
                    if($municipio->insertMunicipio()){  //operación insertar del modelo
                        $result['status'] = 1;
                        $result['message'] = 'Municipio insertado';
                    }else{
                        $result['exception'] = 'Hubo un error';
                    }
                }else{
                    $result['exception'] = 'Departamento no encontrado';
                }
            }else{
                $result['exception'] = 'Longitud de caracteres invalida';
            }

         break;
            //el get es primero despues el update para no confundirse 
         case 'get':
            if($municipio->setId($_POST['Id_municipio'])){
                if($result['dataset'] = $municipio->getMunicipioModal()){
                    $result['status'] = 1;
                }else{
                    $result['exception'] = 'Id inexistente';
                }
            }else{
                $result['exception'] = 'Id incorrecto';
            }            

         break;
         
         case 'update':            
            $_POST = $municipio->validateForm($_POST);
            
            if($municipio->setId($_POST['Id_municipio'])){//es el id del input en el formulario que correponde, si hay mas campos mas if
                if($municipio->getMunicipioModal()){
                    if($municipio->setMunicipio($_POST['MunicipioID'])){
                        if($municipio->setIdDepartamento($_POST['Departamento'])){                     
                            if($municipio->updateMunicipio()){
                                $result['status'] = 1;
                                $result['message'] = 'Municipio modificado';
                            }else{
                                $result['exception'] = 'Operación fallida';
                            }
                        }else{
                            $result['exception'] = 'No se actualizo el departamento';
                        }
                    }else{
                        $result['exception'] = 'Longitud de caracteres invalida';                        
                    }
                }else{
                    $result['exception'] = 'No existe este registro';
                }
            }else{
                $result['exception'] = 'Id Inexistente';
            }
         break;
         
         case 'delete':
                if ($_POST['identifier'] != $_SESSION['id_municipio']) {
                    if ($usuario->setId($_POST['identifier'])) {
                        if ($usuario->getMunicipioModal()) {
                            if ($usuario->deleteMunicipio()) {
                                $result['status'] = 1;
                                $result['message'] = 'Usuario eliminado correctamente';
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                exit('Acción no disponible log');
        }

    } 
    
    print(json_encode($result));  
} else {
    exit('Recurso denegado');
}

?>