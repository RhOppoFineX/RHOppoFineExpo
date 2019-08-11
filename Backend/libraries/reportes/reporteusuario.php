<?php
//los require necesario para que funcione
require_once("plantilla.php");
require_once("../../core/helpers/database.php");
require_once("../../core/helpers/validator.php");
require_once("../../core/models/usuarios.php");

ini_set('date.timezone', 'America/El_Salvador');
$pdf = new PDF();
$usuario = new Usuarios();
$ruta = '../../resources/img/usuario.jpg';
$pdf->head('REPORTE DE USUARIOS');
$pdf->date();
$pdf->SetFont('Arial','B', '10');
$pdf ->SetFillColor(115,168,189);
$pdf ->SetTextColor(255,255,255);
$pdf->Cell(20);

$pdf->Cell(37,10,utf8_decode('Nombre'),1,0,'C',true);
$pdf->Cell(70,10,utf8_decode('Correo'),1,0,'C',true);
$pdf->Cell(37,10,utf8_decode('Foto'),1,0,'C',true);

$pdf->LN(10);

  $data = $usuario->readUsuarios();
  foreach($data as $prueba){
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20);
    $pdf->Cell(37,30,utf8_decode($prueba['nombres_usuario']),1,0,'C',true);
    $pdf->Cell(70,30,utf8_decode($prueba['correo_usuario']),1,0,'C',true);
    $pdf->Cell(37,30,$pdf->Image(($ruta),$pdf->getX()+5, $pdf->getY()+3, 25),1,0,'C');
    $pdf->Ln();

}
$pdf->Output();

?>