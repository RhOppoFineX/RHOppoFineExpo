<?php
//los require necesario para que funcione
require_once("plantilla.php");
require_once("../../core/helpers/database.php");
require_once("../../core/helpers/validator.php");
require_once("../../core/models/graficos.php");

ini_set('date.timezone', 'America/El_Salvador');
$pdf = new PDF();
$graficos = new graficos();
$pdf->head('REPORTE DE COLABORADOR POR MUNICIPIO');
$pdf->date();
$pdf->SetFont('Arial','B', '10');
$pdf ->SetFillColor(115,168,189);
$pdf ->SetTextColor(255,255,255);
$pdf->Cell(50);

$pdf->Cell(47,10,utf8_decode('Sueldo'),1,0,'C',true);
$pdf->Cell(47,10,utf8_decode('Area'),1,0,'C',true);

$pdf->LN(10);

  $graficos->setGenero($_GET['Genero']);
  $data = $graficos->generoGrafico();
  foreach($data as $prueba){
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(50);
    $pdf->Cell(47,30,utf8_decode($prueba['Sueldo']),1,0,'C',true);
    $pdf->Cell(47,30,utf8_decode($prueba['Area']),1,0,'C',true);
    $pdf->Ln();

}
$pdf->Output();

?>