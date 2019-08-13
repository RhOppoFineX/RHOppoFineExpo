<?php

//Llamamos a todos los archivos que ocuparemos  
require_once '../helpers/database.php';
require_once '../helpers/validator.php';
require_once '../models/graficos.php';

if(isset($_GET['action']))
{
    session_start();
    $graficos = new graficos();
    $resultado = array('status' => false, 'message' => null, 'exception' => null); 

    if(isset($_SESSION['Id_usuario']))
    {
        switch ($_GET['action']){

            case 'usuarios':
                if($resultado['dataset'] = $graficos->usuarios()){
                    $resultado['status'] = true;
                } else {
                    $resultado['exception'] = 'No se encontraron datos';
                }
            break;

            case 'genero':
                if($resultado['dataset'] = $graficos->genero()){
                    $resultado['status'] = true;
                } else {
                    $resultado['exception'] = 'No se encontraron datos';
                }
            break;

            case 'religion':
                if($resultado['dataset'] = $graficos->religion()){
                    $resultado['status'] = true;
                } else {
                    $resultado['exception'] = 'No se encontraron datos';
                }
            break;
            
            case 'colaboradorservicio':
                if($resultado['dataset'] = $graficos->colaboradorservicio()){
                    $resultado['status'] = true;
                } else {
                    $resultado['exception'] = 'No se encontraron datos';
                }
            break;

            
            case 'colaboradorservicio':
                if($resultado['dataset'] = $graficos->colaboradorservicio()){
                    $resultado['status'] = true;
                } else {
                    $resultado['exception'] = 'No se encontraron datos';
                }
            break;

            
            case 'colaboradorDepartamento':
                if($resultado['dataset'] = $graficos->colaboradorDepartamento()){
                    $resultado['status'] = true;
                } else {
                    $resultado['exception'] = 'No se encontraron datos';
                }
            break;

            case 'academico':
                if($resultado['dataset'] = $graficos->academico()){
                    $resultado['status'] = true;
                } else {
                    $resultado['exception'] = 'No se encontraron datos';
                }
            break;

            case 'municipio':
                if($graficos->setId_departamento($_POST['Departamento'])){
                    if($resultado['dataset'] = $graficos->municipioColaborador()){
                        $resultado['status'] = true;
                    } else {
                        $resultado['exception'] = 'No se encontraron datos';
                    }
                }                
            break;

            case 'genero':
                if($graficos->setGenero($_POST['Genero'])){
                    if($resultado['dataset'] = $graficos->generoGrafico()){
                        $resultado['status'] = true;
                    }
                } else {
                    $resultado['exception'] = 'No se encontraron datos';
                }
            break;
                
        }

        print(json_encode($resultado));
    } else {
        exit('Debes Iniciar Sesión antes');
    }

} else {
    exit('Recurso denegado');
} 

