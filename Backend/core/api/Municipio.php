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
    $_SESSION['Id_usuario'] = 'Jopen';//Esta linea es momentanea para que podamos ocupar la API sin haber iniciado sesión
    $municipio = new Municipio();//Según sea la tabla que esten ocupando, creamos un objeto del modelo que corresponde
    $resultado = array('status' => 0, 'message'=> null, 'exception' => null);

    //Se verifica si existe una sesión iniciada antes de proceder
    //El switch case evalua que opcion del crud va a ejecutar
    if(isset($_SESSION['Id_usuario'])) {
     switch ($_GET['action']){           

         case 'read':                          //metodo del modelo 
            if($resultado['dataset'] = $municipio->selectMunicipio()){
                $resultado['status'] = true;                
            } else {
                $resultado['exception'] = 'No se han registrado Municipios';
            }
         break;


         case 'create':
            $_POST = $municipio->validateForm($_POST);

            if($municipio->setMunicipio($_POST['MunicipioID'])){  //es el id del input en el formulario que correponde, si hay mas campos mas if
                if($municipio->setId_Departamento($_POST['Departamento'])){            
                    if($municipio->insertMunicipio()){  //operación insertar del modelo
                        $resultado['status'] = true;
                        $resultado['message'] = 'Municipio insertado';
                    }else{
                        $resultado['exception'] = 'Hubo un error';
                    }
                }else{
                    $resultado['exception'] = 'Departamento no encontrado'
                }
            }else{
                $resultado['exception'] = 'Longitud de caracteres invalida';
            }

         break;
            //el get es primero despues el update para no confundirse 
         case 'get':
            if($municipio->setId($_POST['Id_municipio'])){
                if($resultado['dataset'] = $municipio->getMunicipioModal()){
                    $resultado['status'] = true;
                }else{
                    $resultado['exception'] = 'Id inexistente';
                }
            }else{
                $resultado['exception'] = 'Id incorrecto';
            }            

         break;
         
         case 'update':            
            $_POST = $municipio->validateForm($_POST);
            
            if($municipio->setId($_POST['Id_municipio'])){//es el id del input en el formulario que correponde, si hay mas campos mas if
                if($municipio->getMunicipioModal()){
                    if($municipio->setMunicipio($_POST['MunicipioID"'])){
                        if($municipio->setIdDepartamento($_POST['Departamento'])){                     
                            if($municipio->updateMunicipio()){
                                $resultado['status'] = true;
                                $resultado['message'] = 'Municipio modificado';
                            }else{
                                $resultado['exception'] = 'Operación fallida';
                            }
                        }else{
                            $resultado['exception'] = 'No se actualizo el departamento'
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
            if($municipio->setId($_POST['identifier'])){
                if($municipio->getMunicipioModal()){
                    if($municipio->deleteMunicipio()){
                        $resultado['status'] = true;
                        $resultado['message'] = 'Municipio eliminado';
                    }else{
                        $resultado['exception'] = 'Registro no eliminado';
                    }
                }else{
                    $resultado['exception'] = 'Municipio inexistente';
                }
            }else{
                $resultado['exception'] = 'Municipio Incorrecto';
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