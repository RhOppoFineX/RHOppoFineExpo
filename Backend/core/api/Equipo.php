<?php
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/Equipo.php';

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $Equipo = new Equipo;    
    $result = array('status' => 0, 'message' => null, 'exception' => null);    
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['Id_usuario']) && $_GET['action']) {
        switch ($_GET['action']) {

              case 'read':
                if ($result)['dataset'] = $Equipo->readEquipo()){
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No se han encontrado equipo registrados';
                }
                break;

                case 'create':
                    $_POST = $Equipo->validateForm($_POST);

                        if($Equipo->setNombre($_POST['Nombre-equipoA'])){
                            if($Equipo->setId_tipo_equipo($_POST['tipo-equipoA'])){  
                                $result['status'] = 1;
                                $result['message'] = 'Equipo creado correctamente';
                            }else{
                                $result['Selecione una opcion valida'];
                            }
                        }else{
                            $result['exception'] = 'Operacion fallida';
                        }
                break;
                           
                case 'update':
                    $_POST = $Equipo->validateForm($_POST);

                    if($Equipo->setNombre_equipo($_POST['Nombre-equipoA'])){
                        if($Equipo->setId_tipo_equipo($_POST['tipo-equipoA'])){  
                            $result['status'] = true;
                            $result['message'] = 'Equipo modificado correctamente';
                        }else{
                            $result['Selecione una opcion valida'];
                        }
                    }else{
                        $result['exception'] = 'Operacion fallida';
                    }

                    case 'delete':
                    if ($_POST['identifier'] != $_SESSION['Id_equipo']) {
                        if ($Equipo->setId($_POST['identifier'])) {
                            if ($Equipo>getNombre_equipo()) {
                                if ($Equipo->deleteEquipo()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Equipo eliminado correctamente';
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = 'Equipo inexistente';
                            }
                        } else {
                            $result['exception'] = 'Equipo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'No se puede eliminar a sí mismo';
                    }
                    break;  

                }
?>