<?php
//los require necesario para que funcione
require_once("plantilla.php");
require_once("../../core/helpers/database.php");
require_once("../../core/helpers/validator.php");
require_once("../../core/models/productos.php");

ini_set('date.timezone', 'America/El_Salvador');
$pdf = new PDF();
$productos = new Productos();
$ruta = '../../resources/img/productos/';
$pdf->head('REPORTE DE PRODUCTO MI VIDA');
$pdf->date();
$pdf->SetFont('Arial','B', '10');
$pdf ->SetFillColor(115,168,189);
$pdf ->SetTextColor(255,255,255);

$pdf->Cell(37,10,utf8_decode('Foto'),1,0,'C',true);
$pdf->Cell(27,10,utf8_decode('Nombre'),1,0,'C',true);
$pdf->Cell(27,10,utf8_decode('Codigo'),1,0,'C',true);
$pdf->Cell(27,10,utf8_decode('Cantidad'),1,0,'C',true);
$pdf->Cell(27,10,utf8_decode('Garantia'),1,0,'C',true);
$pdf->Cell(39,10,utf8_decode('Descripcion'),1,0,'C',true);

$pdf->LN(10);

  $data = $productos->listProducto();
  foreach($data as $prueba){
    $pdf->SetFont('Arial','','10');
    $pdf->SetFillColor(255,255,255);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(37,30,$pdf->Image(($ruta.$prueba['foto']),$pdf->getX()+5, $pdf->getY()+3, 25),1,0,'C');
    $pdf->Cell(27,30,utf8_decode($prueba['nombre']),1,0,'C', true);
    $pdf->Cell(27,30,utf8_decode($prueba['codigo']),1,0,'C', true);
    $pdf->Cell(27,30,utf8_decode($prueba['cantidad']),1,0,'C', true);
    $pdf->Cell(27,30,utf8_decode($prueba['meses']),1,0,'C', true);
    $pdf->Cell(39,30,utf8_decode($prueba['descripcion']),1,0,'C', true);
    $pdf->Ln();

}
$pdf->Output();

?>