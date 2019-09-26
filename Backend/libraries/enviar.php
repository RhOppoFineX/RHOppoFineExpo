<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output / ver los errores
    $mail->isSMTP();                                            // Set mailer to use SMTP / protoclo para enviar
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers / server del servicio de correo
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'd.arias2000.eh@gmail.com';                     // SMTP username
    $mail->Password   = 'deahwasdarias$10';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('d.arias2000.eh@gmail.com', 'Diego Arias'); //desde donde se envía 
    $mail->addAddress('dmessi2000@gmail.com', 'Macizo');     // Add a recipient / a quien se le envia
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML / si acepta html
    $mail->Subject = 'El asunto del email';
    $mail->Body    = 'hola este es un correo de prueba';
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'El mensaje se envió correctamente';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
$reefer = $_SERVER['HTTP_REFERER'];
header('Location:' .$reefer);

