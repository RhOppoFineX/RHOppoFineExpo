<?php
//los require necesario para que funcione
require_once("plantilla.php");
require_once("../../core/helpers/database.php");
require_once("../../core/helpers/validator.php");
require_once("../../core/models/clientes.php");

ini_set('date.timezone', 'America/El_Salvador');
$pdf = new PDF();
$clientess = new Clientes();
$pdf->head('REPORTE DE CLIENTES MI AMOR');
$pdf->date();
$pdf->SetFont('Arial','B', '10');
$pdf ->SetFillColor(115,168,189);
$pdf ->SetTextColor(255,255,255);

$pdf->Cell(47,10,utf8_decode('Nombre'),1,0,'C',true);
$pdf->Cell(47,10,utf8_decode('Apellido'),1,0,'C',true);
$pdf->Cell(47,10,utf8_decode('Dui'),1,0,'C',true);
$pdf->Cell(47,10,utf8_decode('Correo'),1,0,'C',true);

$pdf->LN(10);

  $data = $clientess->readClientes();
  foreach($data as $prueba){
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(47,10,utf8_decode($prueba['nombre']),1,0,'C',true);
    $pdf->Cell(47,10,utf8_decode($prueba['apellido']),1,0,'C',true);
    $pdf->Cell(47,10,utf8_decode($prueba['Dui']),1,0,'C',true);
    $pdf->Cell(47,10,utf8_decode($prueba['correo']),1,0,'C',true);
    $pdf->Ln();

}
$pdf->Output();

?>