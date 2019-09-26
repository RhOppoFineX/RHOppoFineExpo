<?php
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/usuarios.php';
require_once '../../libraries/enviar.php';

//Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;    
    $email = new Email;                       
    $result = array('status' => false, 'message' => null, 'exception' => null, 'email' => false);    
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['Id_usuario'])) {
        switch ($_GET['action']) {

            case 'timeAccount':
                if($usuario->setId($_SESSION['Id_usuario'])){
                    if($result['dataset'] = $usuario->noventaDias()){
                        $result['status'] = true;
                    } else {
                        $result['exception'] = 'No se puede obtener la fecha';
                    }
                } else {
                    $result['exception'] = 'Usuario Invalido';
                }
            break;

            case 'logout':
                if($usuario->setActividad(0)){
                    if($usuario->setCorreo($_SESSION['Correo_usuario'])){//cambiar
                        if($usuario->updateActividad()){
                            if (session_destroy()){
                                header('location: ../../../Frontend/');
                            } else {
                                header('location: ../../../Frontend/cerrar.php');
                            }
                        } else {
                            $result['exception'] = 'No se ha podido actulizar la actividad del usuario';
                        }
                    } else {
                        $result['exception'] = 'Correo Invalido';
                    }
                } else {
                    $result['exception'] = 'Dato de activida no valido';
                }
            break;
           
            case 'readProfile':
                if ($usuario->setId($_SESSION['Id_usuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = true;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'editProfile':
                if ($usuario->setId($_SESSION['Id_usuario'])) {
                    if ($usuario->getUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombres($_POST['Nombres-P'])) {
                            if ($usuario->setApellidos($_POST['Apellidos-P'])) {
                                if ($usuario->setCorreo($_POST['Correo-P'])) {
                                    if ($usuario->setAlias($_POST['userName-P'])) {
                                        if($usuario->checkCorreo()){
                                            if ($usuario->updateUsuarioPropio()) {
                                                $_SESSION['Correo_usuario'] = $usuario->getCorreo();//preguntar al profe que es esta linea
                                                $result['status'] = true;
                                                $result['message'] = 'Perfil modificado correctamente';
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = 'El correo no puede ser igual a la clave';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de usuario incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'password':
                if ($usuario->setId($_SESSION['Id_usuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if($_POST['clave_nueva_1'] != $_POST['clave_actual_1']){
                                            if($usuario->checkPassForEmail()){
                                                if($usuario->updateDate()){
                                                    if ($usuario->changePassword()) {
                                                        $result['status'] = true;
                                                        $result['message'] = 'Contraseña cambiada correctamente';
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = 'No se ha podido actualizar la fecha';
                                                }        

                                            } else {
                                                $result['exception'] = 'La clave no puede ser igual al correo';
                                            }
                                        } else {
                                            $result['exception'] = 'La nueva contraseña debe ser diferente a la anterior';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 8 caracteres y debe tener al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 8 caracteres y debe tener al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'read':
                if ($result['dataset'] = $usuario->readUsuarios()) {
                    $result['status'] = true;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $usuario->searchUsuarios($_POST['search'])) {
                        $result['status'] = true;
                        $rows = count($result['dataset']);
						if ($rows > 1) {
							$result['message'] = 'Se encontraron '.$rows.' coincidencias';
						} else {
							$result['message'] = 'Solo existe una coincidencia';
						}
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                
                if ($usuario->setNombres($_POST['Nombres-A'])) {
                    if ($usuario->setApellidos($_POST['Apellidos-A'])) {
                        if ($usuario->setCorreo($_POST['Correo-A'])) {
                            if ($usuario->setAlias($_POST['userName-A'])) {
                                if($usuario->setId_tipo_usuario($_POST['Tipos-A'])){                            
                                    if ($_POST['Contraseña-A'] == $_POST['ContraseñaDos-A']) {
                                        if($_POST['Contraseña-A'] != $_POST['Correo-A']){
                                            if ($usuario->setClave($_POST['Contraseña-A'])) {
                                                if ($usuario->createUsuario()){
                                                    $result['status'] = true;
                                                    $result['message'] = 'Usuario creado correctamente';
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = 'Clave menor a 8 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.';
                                            }
                                        } else {
                                            $result['exception'] = 'Su clave no puede ser igual a su correo';
                                        }
                                    } else {
                                        $result['exception'] = 'Claves diferentes';
                                    }
                                }else{
                                    $result['exception'] = 'Selecione una opcion valida';
                                } 
                            } else {
                                $result['exception'] = 'Alias incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
            case 'get':
                if ($usuario->setId($_POST['Id_usuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = true;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                
                if ($usuario->setId($_POST['Id_usuario'])) {
                    if ($usuario->getUsuario()) {
                        if ($usuario->setNombres($_POST['Nombres'])) {
                            if ($usuario->setApellidos($_POST['Apellidos'])) {
                                if ($usuario->setCorreo($_POST['Correo'])) {
                                    if ($usuario->setAlias($_POST['userName'])) {
                                        if($usuario->setId_tipo_usuario($_POST['Tipos'])){
                                            if ($usuario->updateUsuario()) {
                                                $result['status'] = true;
                                                $result['message'] = 'Usuario modificado correctamente';
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        }else{
                                            $result['exception'] = 'Opción Invalida';
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'delete':
                if ($_POST['identifier'] != $_SESSION['Id_usuario']) {
                    if ($usuario->setId($_POST['identifier'])) {
                        if ($usuario->getUsuario()) {
                            if ($usuario->deleteUsuario()) {
                                $result['status'] = true;
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
            
            case 'disable':
                if($_POST['identifier'] != $_SESSION['Id_usuario']){
                    if($usuario->setId($_POST['identifier'])){
                        if($usuario->setEstado(0)){
                            if($usuario->getUsuario()){
                                if($usuario->disableUsuario()){
                                    $result['status'] = true;
                                    $result['message'] = 'Usuario deshabilitado correctamente';
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = 'Usuario inexistente';
                            }
                        } else {
                            $result['exception'] = 'Estado incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Usuario Incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede deshabilitar a sí mismo';
                }               
            break;

            case 'login':
                $result['exception'] = 'Ya hay una sesión iniciada';
            break;

            default:                
                exit('Acción no disponible');
            break;    
        }
    } else {
        switch ($_GET['action']) {
            case 'read':
                if ($usuario->readUsuarios()) {
                    $result['status'] = true;
                    $result['message'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['message'] = 'No existen usuarios registrados';
                }
                break;
            case 'register':
                $_POST = $usuario->validateForm($_POST);                
                if(!$usuario->readUsuarios()){
                    if ($usuario->setNombres($_POST['Nombres'])) {
                        if ($usuario->setApellidos($_POST['Apellidos'])) {
                            if ($usuario->setCorreo($_POST['Correo'])) {
                                if ($usuario->setAlias($_POST['userName'])) {
                                    if($usuario->setId_tipo_usuario(1)){
                                        if ($_POST['Contraseña'] == $_POST['ContraseñaDos']) {
                                            if ($usuario->setClave($_POST['Contraseña'])) {
                                                if ($usuario->createUsuario()) {
                                                    $result['status'] = true;
                                                    $result['message'] = 'Usuario registrado correctamente';
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = 'Clave menor a 8 caracteres y debe tener al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.';
                                            }
                                        } else {
                                            $result['exception'] = 'Claves diferentes';
                                        }
                                    }else{
                                        $result['exception'] = 'tipo de usuario incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Alias incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrectos';
                    }
                } else {
                    $result['exception'] = 'Ya existe al menos un usuario';
                }
                break;
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setCorreo($_POST['signin-email'])) {
                    if ($usuario->checkEmail()) {
                        if ($usuario->setClave($_POST['signin-password'])) {
                            if ($usuario->checkPassword()) {
                                if($usuario->checkActividad()){
                                    if($usuario->setActividad(1)){
                                        if($usuario->updateActividad()){
                                            if($usuario->setIntentos(0)){
                                                if($usuario->aumentarIntentos()){
                                                    $_SESSION['Id_usuario'] = $usuario->getId();
                                                    $_SESSION['Correo_usuario'] = $usuario->getCorreo();
                                                    $_SESSION['Tipo_usuario'] = $usuario->getTipo_usuario();
                                                    $result['status'] = true;
                                                    $result['message'] = 'Autenticación correcta';                                                 
                                                } else {
                                                    $result['exception'] = 'Ha fallado';
                                                }
                                            } else {
                                                $result['exception'] = 'Ha fallado';
                                            }
                                        } else {
                                            $result['exception'] = 'No se ha podido cambiar la actividad';
                                        }
                                    } else {
                                        $result['exception'] = 'Dato de actividad no valido';
                                    }

                                } else {
                                    $result['exception'] = 'Ya hay una sesión activa de esta cuenta';
                                }                                
                            } else {
                                if($usuario->getIntentos() < 5)
                                    $result['exception'] = 'Clave inexistente, ha realizado ' .$usuario->getIntentos() . ' Intentos';
                                 else   
                                    $result['exception'] = 'Cuenta Bloqueada';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 8 caracteres y debe tener al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.';
                        }
                    } else {
                        $result['exception'] = 'Correo inexistente';
                    }
                } else {
                    $result['exception'] = 'Correo incorrecto';
                }
                break;

            case 'reset':
                $_POST = $usuario->validateForm($_POST);
                $token = null;

                if($usuario->setCorreo($_POST['Correo'])){
                    if($usuario->checkEmail()){
                        if($token = $email->Enviar(7, $usuario->getCorreo(), $usuario->getNombres(), $usuario->getApellidos())){//longitud del token
                            if($usuario->setToken($token)){
                                if($usuario->updateToken()){
                                    $result['status'] = true;
                                    $result['message'] = 'Se ha enviado una clave de acceso a su correo';
                                    $result['email'] = true;
                                } else {
                                    $result['exception'] = 'No se puedo actualizar el Token';
                                }
                            } else {
                                $result['exception'] = 'Token Invalido';
                            }
                        } else {
                            $result['exception'] = 'No se pudo enviar el correo';
                        }
                    } else {
                        $result['exception'] = 'Correo Inexistente';
                    }
                } else {
                    $result['exception'] = 'Correo Incorrecto';
                }

            break;            

            default:
                exit('Acción no disponible');
        }
    }
    print(json_encode($result));  

} else {
	exit('Recurso denegado');
}
?>
