<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Parentesco.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset
if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $parentesco = new Parentesco();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

         case 'read':                          //metodo del modelo 
            if($resultado['dataset'] = $parentesco->selectParentesco()){
                $resultado['status'] = true;                
            } else {
                $resultado['exception'] = 'No se han registrado datos Parentesco';
            }
         break;


         case 'create':
            $_POST = $parentesco->validateForm($_POST);

            if($parentesco->setParentesco($_POST['Parentesco'])){  
                if($parentesco->insertParentesco()){
                    $resultado['status'] = true;
                    $resultado['message'] = 'Parentesco insertado';
                }else{
                    $resultado['exception'] = 'Ocurrio un error';
                }
            }else{
                $resultado['exception'] = 'Longitud de caracteres invalida';
            }

         break;
            
         case 'get':
            if($parentesco->setId($_POST['Id_parentesco'])){
                if($resultado['dataset'] = $parentesco->getParentescoModal()){
                    $resultado['status'] = true; 
                }else{                      
                    $resultado['exception'] = 'Id inexistente';
                }
            }else{
                $resultado['exception'] = 'Id incorrecto';
            }            

         break;
         
         case 'update':            
            $_POST = $parentesco->validateForm($_POST);
            
            if($parentesco->setId($_POST['Id_parentesco'])){
                if($parentesco->getParentescoModal()){
                    if($parentesco->setParentesco($_POST['Parentesco'])){
                        if($parentesco->updateParentesco()){
                            $resultado['status'] = true;
                            $resultado['message'] = 'Parentesco modificado';
                        }else{
                            $resultado['exception'] = 'Operación fallida';
                        }                                                
                    }else{
                        $resultado['exception'] = 'Longitud de caracteres invalida';                        
                    }
                }else{
                    $resultado['exception'] = 'No existe este registro';
                }
            }else{
                $resultado['exception'] = 'Id Inexistente';
            }
         break;
         
         case 'delete':
            if($parentesco->setId($_POST['identifier'])){
                if($parentesco->getParentescoModal()){
                    if($parentesco->deleteParentesco()){
                        $resultado['status'] = true;
                        $resultado['message'] = 'Parentesco eliminada';
                    }else{
                        $resultado['exception'] = 'Registro no eliminado';
                    }
                }else{
                    $resultado['exception'] = 'Parentesco inexistente';
                }
            }else{
                $resultado['exception'] = 'Parentesco Incorrecto';
            }
         break;

         default:
            exit('Acción no disponible');
         
     }
     
        print(json_encode($resultado));

    } else {
        exit('Debes Iniciar Sesión antes');
    }

} else {
    exit('Recurso denegado');
}

?>