<?php

session_start();

if(isset($_SESSION['Id_usuario'])){

    $filename = basename($_SERVER['PHP_SELF']);

    //var_dump($filename);

    if($filename === 'index.php' || $filename === 'register.php')
        header('Location: charts.php');

    
    // if(!$_SESSION['Id_tipo_usuario'] <= $nivel_acceso){
    //     header('Location: ');
    // }   

} else {

    $filename = basename($_SERVER['PHP_SELF']);

    if($filename != 'index.php')
        header('Location: index.php');          
}