<?php
//los require necesario para que funcione
require_once("plantilla.php");
require_once("../../core/helpers/database.php");
require_once("../../core/helpers/validator.php");
require_once("../../core/models/categorias.php");

ini_set('date.timezone', 'America/El_Salvador');
//tenemos el p y L en orientacion, mm,cm,in,pt en texto, A2,A3,A4,Letter y Legal en texto mixto
$pdf = new PDF('p','mm','Letter');
$categoria = new Categorias();
$ruta = '../../resources/img/categorias/';
$pdf->head('REPORTE DE LAS CATEGORIAS MI PRINCESA');
$pdf->date();
$pdf->SetFont('Arial','B', '10');
$pdf ->SetFillColor(115,168,189);
$pdf ->SetTextColor(255,255,255);
$pdf->Cell(40);

$pdf->Cell(37,10,utf8_decode('ID'),1,0,'C',true);
$pdf->Cell(37,10,utf8_decode('Nombre'),1,0,'C',true);
$pdf->Cell(37,10,utf8_decode('Foto'),1,0,'C',true);

$pdf->LN(10);

  $data = $categoria->readCategoria();
  foreach($data as $prueba){
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(40);
    $pdf->Cell(37,30,utf8_decode($prueba['id_categoria']),1,0,'C',true);
    $pdf->Cell(37,30,utf8_decode($prueba['nombre']),1,0,'C',true);
    $pdf->Cell(37,30,$pdf->Image(($ruta.$prueba['foto']),$pdf->getX()+5, $pdf->getY()+3, 25),1,0,'C');
    $pdf->Ln();

}
$pdf->Output();

?>