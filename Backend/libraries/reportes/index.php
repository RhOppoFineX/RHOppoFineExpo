<?php error_reporting(0);
 
require_once("../../core/helpers/database.php");
require_once("../../core/helpers/validator.php");
require_once("../../core/models/productos.php");
require_once("../fpdf/fpdf.php");


//Conecto a la base de datos
$enlace = mysql_connect("localhost", "root");
 
mysql_select_db("medicaldriver", $enlace);
//Consulta la tabla productos solicitando todos los productos
 
$resultado = mysql_query("SELECT * FROM producto", $link);
 
//Instaciamos la clase para generar el documento pdf
$pdf=new FPDF();
 
//Agregamos la primera pagina al documento pdf
$pdf->AddPage();
 
//Seteamos el inicio del margen superior en 25 pixeles
 
$y_axis_initial = 25;
 
//Seteamos el tiupo de letra y creamos el titulo de la pagina. No es un encabezado no se repetira
$pdf->SetFont('Arial','B',12);
 
$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6,'LISTA DE PRODUCTOS',1,0,'C');
 
$pdf->Ln(10);
 
//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(125,6,'Nombre',1,0,'C',1);
 
$pdf->Cell(30,6,'Precio',1,0,'C',1);
$pdf->Cell(30,6,'Cantidad',1,0,'C',1);
 
$pdf->Ln(10);
 
//Comienzo a crear las fiulas de productos según la consulta mysql
 
forea($fila = mysql_fetch_array($resultado));
{
 
}
 
mysql_close($enlace);
 
//Mostramos el documento pdf
$pdf->Output();
 
?>