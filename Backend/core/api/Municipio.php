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
    $municipio = new Municipio;
    $result = array('status' => 0, 'message'=> null, 'exception' => null);    

    //Se verifica si existe una sesión iniciada antes de proceder
    //El switch case evalua que opcion del crud va a ejecutar
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

        case 'read':
            if ($result['dataset'] = $municipio->readmunicipio()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay municipios registrados';
            }
            break;

         case 'create':
            $_POST = $municipio->validateForm($_POST);

            if($municipio->setmunicipio($_POST['Municipio-A'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                if($municipio->setId_departamento($_POST['Departamento-A'])){            
                    if($municipio->createmunicipio()){  //operación insertar del modelo
                        $result['status'] = 1;
                        $result['message'] = 'Municipio insertado';
                    }else{
                        $result['exception'] = 'Hubo un error';
                    }
                }else{
                    $result['exception'] = 'Municipio no encontrado';       
                }
            }else{
                $result['exception'] = 'Longitud de caracteres invalida'; 
            }

         break;
            //el get es primero despues el update para no confundirse 
         case 'get':
            if($municipio->setId($_POST['Id_municipio'])){
                if($result['dataset'] = $municipio->getmunicipioModal()){
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
                if($municipio->getmunicipioModal()){
                    if($municipio->setmunicipio($_POST['Municipio-B'])){
                        if($municipio->setId_departamento($_POST['Departamento-B'])){                     
                            if($municipio->updatemunicipio()){
                                $result['status'] = 1;
                                $result['message'] = 'Municipio modificado';
                            }else{
                                $result['exception'] = 'Operación fallida';
                            }
                        }else{
                            $result['exception'] = 'No se actualizo el municipio';
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
                    if ($municipio->setId($_POST['identifier'])) {
                        if ($municipio->getmunicipioModal()) {
                            if ($municipio->deletemunicipio()) {
                                $result['status'] = true;
                                $result['message'] = 'Municipio eliminado correctamente';
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Municipio inexistente';
                        }
                    } else {
                        $result['exception'] = 'Municipio incorrecto';
                    }
                
                break;
            default:
                exit('Acción no disponible log');
        }
        print(json_encode($result));
    }else{
        exit('Debes Iniciar Sesión antes');
    } 
	
} else {
	exit('Recurso denegado');
}
?>