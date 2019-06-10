<?php
//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Estado-civil.php';
//IMPORTANTE para los insert, update y delete no es necesario el dataset

if(isset($_GET['action']))
{
    //Esta funcion siempre se pone para porder hacer uso de la variable $_SESSION y controlar el inicio de sesiones
    session_start();
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $Estado_civil = new Estado();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    //Se verifica si existe una sesión iniciada antes de proceder
    //El switch case evalua que opcion del crud va a ejecutar
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

         case 'read':                          //metodo del modelo 
            if($resultado['dataset'] = $Estado_civil->selectEstado()){
                $resultado['status'] = true;                
            } else {
                $resultado['exception'] = 'No se han registrado ningun Estado civil';
            }
         break;

         case 'create':
         $_POST = $Estado_civil->validateForm($_POST);

         if($Estado_civil->setEstado($_POST['Id_estado-civil'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
             if($Estado_civil->insertEstado()){  //operación insertar del modelo
                 $resultado['status'] = true;
                 $resultado['message'] = 'Estado civil insertado';
             }else{
                 $resultado['exception'] = 'Hubo un error';
             }
         }else{
             $resultado['exception'] = 'Longitud de caracteres invalida';
         }

      break;
      //el get es primero despues el update, para no confundirse 
      case 'get':
      if($Estado_civil->setId($_POST['Id_estado_civil'])){ //es el id del input modificar
          if($resultado['dataset'] = $Estado_civil->getEstadoModal()){
              $resultado['status'] = true;                
          }else{
              $resultado['exception'] = 'Id inexistente';
          }
      }else{
          $resultado['exception'] = 'Id incorrecto';
      }            

   break;

   case 'update':            
   $_POST = $Estado_civil->validateForm($_POST);
   
   if($Estado_civil->setId($_POST['Id_estado-civil'])){//es el id del input en el formulario que correponde, si hay mas campos mas if
       if($Estado_civil->getEstadoModal()){
           if($Estado_civil->setEstado($_POST['EstadoCivil'])){
               if($Estado_civil->updateEstado()){
                   $resultado['status'] = true;
                   $resultado['message'] = 'Estado civil modificado';
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
if($Estado_civil->setId($_POST['identifier'])){
    if($Estado_civil->getEstadoModal()){
        if($Estado_civil->deleteEstado()){
            $resultado['status'] = true;
            $resultado['message'] = 'Estado civil eliminado';
        }else{
            $resultado['exception'] = 'Registro no eliminado';
        }
    }else{
        $resultado['exception'] = 'Estado civil inexistente';
    }
}else{
    $resultado['exception'] = 'Estado civil Incorrecto';
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