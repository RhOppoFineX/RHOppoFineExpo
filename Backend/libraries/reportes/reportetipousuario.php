<?php
//los require necesario para que funcione
require_once("plantilla.php");
require_once("../../core/helpers/database.php");
require_once("../../core/helpers/validator.php");
require_once("../../core/models/tipoUsuario.php");

ini_set('date.timezone', 'America/El_Salvador');
$pdf = new PDF();
$tipoUsuario = new tipoUsuario();
$ruta = '../../Frontend/assets/img/user5.png';
$pdf->head('REPORTE DE TIPOS USUARIOS');
$pdf->date();
$pdf->SetFont('Arial','B', '10');
$pdf ->SetFillColor(115,168,189);
$pdf ->SetTextColor(255,255,255);
$pdf->Cell(20);

$pdf->Cell(40,10,utf8_decode('Tipo usuario'),1,0,'C',true);//cambien las dimesiones de la columna segun les convenga
$pdf->Cell(70,10,utf8_decode('Cantidad'),1,0,'C',true);//las dimesiones son los numeros el primero es el ancho el segundo es el largo

$pdf->LN(10);

  $data = $tipoUsuario->readTipoUsuario();
  foreach($data as $prueba){
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(20);
    $pdf->Cell(40,30,utf8_decode($prueba['Cantidad']),1,0,'C',true);
    $pdf->Cell(70,30,utf8_decode($prueba['Usuario']),1,0,'C',true);
    $pdf->Ln();

}
$pdf->Output();

?>