<?php
require('pdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(40,10,'Reporte Proveedor',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    //$this->Cell(20,10,utf8_decode( 'N°'),1,0,'C',0);
    $this->Cell(50,10, 'Nombre',1,0,'C',0);
    $this->Cell(34,10, 'Telefono',1,0,'C',0);
    $this->Cell(52,10, 'Direccion',1,0,'C',0);
    $this->Cell(60,10, 'Email',1,1,'C',0);
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require "conexion.php";
    $consulta = "SELECT * FROM proveedor";
    $resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
//$pdf->Cell(40,10, utf8_decode('¡Hola, Mundo!'));

while ($row = $resultado ->fetch_assoc()){
   // $pdf->Cell(20,10, $row['Proveedor_ID'],1,0,'C',0);
    $pdf->Cell(50,10, $row['Proveedor_Nombre'],1,0,'C',0);
    $pdf->Cell(34,10, $row['Proveedor_Telefono'],1,0,'C',0);
    $pdf->Cell(52,10, $row['Proveedor_Direccion'],1,0,'C',0);
    $pdf->Cell(60,10, $row['Proveedor_Email'],1,1,'C',0);
    
}



$pdf->Output();
?>