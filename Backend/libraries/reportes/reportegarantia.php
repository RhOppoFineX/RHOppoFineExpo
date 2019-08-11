<?php
//los require necesario para que funcione
require_once("plantilla.php");
require_once("../../core/helpers/database.php");
require_once("../../core/helpers/validator.php");
require_once("../../core/models/garantias.php");

ini_set('date.timezone', 'America/El_Salvador');
$pdf = new PDF();
$garantia = new Garantias();
$ruta = '../../resources/img/garantia.png';
$pdf->head('REPORTE DE GARANTÍAS');
$pdf->date();
$pdf->SetFont('Arial','B', '10');
$pdf ->SetFillColor(115,168,189);
$pdf ->SetTextColor(255,255,255);
$pdf->Cell(40);

$pdf->Cell(37,10,utf8_decode('Estado'),1,0,'C',true);
$pdf->Cell(37,10,utf8_decode('Meses/Año'),1,0,'C',true);
$pdf->Cell(37,10,utf8_decode('Foto'),1,0,'C',true);

$pdf->LN(10);

  $data = $garantia->listGarantia();
  foreach($data as $prueba){
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(40);
    $pdf->Cell(37,30,utf8_decode($prueba['estado']),1,0,'C',true);
    $pdf->Cell(37,30,utf8_decode($prueba['meses']),1,0,'C',true);
    $pdf->Cell(37,30,$pdf->Image(($ruta),$pdf->getX()+5, $pdf->getY()+3, 25),1,0,'C');
    $pdf->Ln();

}
$pdf->Output();

?>