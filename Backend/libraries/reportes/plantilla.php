<?php
//los require necesario para que funcione
require_once("../fpdf/fpdf.php");
session_start();
class PDF extends FPDF
{
    private $title;

    function head ($title){
        $this->title = $title;
        $this->AddPage();
        $this->AliasNbPages();
    }
// Cabecera de página
function Header()
{
    $this->Image('../../resources/img/MedicalDriverLogo.png',15, 10, 30);
    $this->Cell(65, 13);
    $this->SetFont('Arial','B',15);
    $this->SetTextColor(255,255,255);
    $this->SetFillColor(60, 131, 255) ;
    $this->Cell(125,13, utf8_decode($this->title),0,0,'C', true);
    // Salto de líne
    $this->Ln(15);

}

function date()
{
    $this->Ln(5);
    $this->SetFont('Arial', '', 10);
    $this->SetTextColor(0,0,0);
    $this->SetFillColor(255,255,255);
    $this->Cell(50,5, utf8_decode('Fecha de Creación:'.date(' j/n/Y') ),0,0,'R', false);
    $this->Cell(50,5, utf8_decode('Hora de Creación:'.date('G:i:s') ),0,0,'R', false);
    $this->Cell(55,5, utf8_decode('Creado por: '.$_SESSION['alias_usuario'] ),0,0,'R', false);
    $this->Ln(10);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',10);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo(),0,0,'C');
}
}
?>