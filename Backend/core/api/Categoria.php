<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Categoria.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset
if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $categoria = new Categoria();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

         case 'read':                          //metodo del modelo 
            if($resultado['dataset'] = $categoria->selectCategoria()){
                $resultado['status'] = true;                
            } else {
                $resultado['exception'] = 'No se han registrado datos Categoria';
            }
         break;


         case 'create':
            $_POST = $categoria->validateForm($_POST);

            if($categoria->setCategoria($_POST['Categoria'])){  
                if($categoria->insertCategoria()){
                    $resultado['status'] = true;
                    $resultado['message'] = 'categoria insertado';
                }else{
                    $resultado['exception'] = 'Ocurrio un error';
                }
            }else{
                $resultado['exception'] = 'Longitud de caracteres invalida';
            }

         break;
            
         case 'get':
            if($categoria->setId($_POST['Id_categoria'])){
                if($resultado['dataset'] = $categoria->getCategoriaModal()){
                    $resultado['status'] = true; 
                }else{                      
                    $resultado['exception'] = 'Id inexistente';
                }
            }else{
                $resultado['exception'] = 'Id incorrecto';
            }            

         break;
         
         case 'update':            
            $_POST = $categoria->validateForm($_POST);
            
            if($categoria->setId($_POST['Id_categoria'])){
                if($categoria->getCategoriaModal()){
                    if($categoria->setCategoria($_POST['Categoria'])){
                        if($categoria->updateCategoria()){
                            $resultado['status'] = true;
                            $resultado['message'] = 'Categoria modificada';
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
            if($categoria->setId($_POST['identifier'])){
                if($categoria->getCategoriaModal()){
                    if($categoria->deleteCategoria()){
                        $resultado['status'] = true;
                        $resultado['message'] = 'Categoria eliminada';
                    }else{
                        $resultado['exception'] = 'Registro no eliminado';
                    }
                }else{
                    $resultado['exception'] = 'Categoria inexistente';
                }
            }else{
                $resultado['exception'] = 'Categoria Incorrecta';
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