<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Tipo-equipo.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset
if(isset($_GET['action']))
{
 
    session_start();
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $Tipo_equipo = new TipoEquipo();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

     
    if(isset($_SESSION['Id_usuario'])) {
        switch ($_GET['action']){           
   
            case 'read':                          //metodo del modelo 
               if($resultado['dataset'] = $Tipo_equipo->selectTipo()){
                   $resultado['status'] = true;                
               } else {
                   $resultado['exception'] = 'No se han registrado Tipo equipo';
               }
            break;

            case 'create':
            $_POST = $Tipo_equipo->validateForm($_POST);

            if($Tipo_equipo->setTipo($_POST['TipoEquipo'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                if($Tipo_equipo->insertTipo()){  //operación insertar del modelo
                    $resultado['status'] = true;
                    $resultado['message'] = 'Tipo equipo insertado';
                }else{
                    $resultado['exception'] = 'Hubo un error';
                }
            }else{
                $resultado['exception'] = 'Longitud de caracteres invalida';
            }

         break;

          //el get es primero despues el update para no confundirse 
          case 'get':
          if($Tipo_equipo->setId($_POST['Id_tipo_equipo'])){//Id del form modificar
              if($resultado['dataset'] = $Tipo_equipo->getTipoModal()){
                  $resultado['status'] = true;                
              }else{
                  $resultado['exception'] = 'Id inexistente';
              }
          }else{
              $resultado['exception'] = 'Id incorrecto';
          }            

       break;

       case 'update':            
            $_POST = $Tipo_equipo->validateForm($_POST);
            
            if($Tipo_equipo->setId($_POST['Id_tipo_equipo'])){//es el id del input en el form que correponde, si hay mas campos mas if
                if($Tipo_equipo->getTipoModal()){
                    if($Tipo_equipo->setTipo($_POST['Tipo_equipo'])){ //name del input 
                        if($Tipo_equipo->updateTipo()){
                            $resultado['status'] = true;
                            $resultado['message'] = 'Tipo equipo modificado';
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
            if($Tipo_equipo->setId($_POST['identifier'])){
                if($Tipo_equipo->getTipoModal()){
                    if($Tipo_equipo->deleteTipo()){
                        $resultado['status'] = true;
                        $resultado['message'] = 'Tipo equipo eliminado';
                    }else{
                        $resultado['exception'] = 'Registro no eliminado';
                    }
                }else{
                    $resultado['exception'] = 'Tipo equipo inexistente';
                }
            }else{
                $resultado['exception'] = 'Tipo equipo Incorrecto';
            }
         break;

         default:
         exit('Acción no disponible');
      
  }
    //Devolvemos la informacion ($resultado) pero la convertimos a formato JSON
        print(json_encode($resultado));

    } else {
        exit('Debes Iniciar Sesión antes');
    }

    } else {
    exit('Recurso denegado');
    }

?>