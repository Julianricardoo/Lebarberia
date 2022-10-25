<?php
require('../pdf/fpdf.php');

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
    $this->Cell(40,10,'Reporte inventario',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(20,10,utf8_decode( 'N°'),1,0,'C',0);
    $this->Cell(50,10, 'Nombre',1,0,'C',0);
    $this->Cell(30,10, 'Tipo',1,0,'C',0);
    $this->Cell(25,10, 'Stock',1,0,'C',0);
    $this->Cell(28,10, 'Precio',1,0,'C',0);
    $this->Cell(38,10, 'Fecha entrada',1,1,'C',0);
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
require "../../Controlador/conexion.php";
    $consulta = "SELECT * FROM inventario";
    $resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
//$pdf->Cell(40,10, utf8_decode('¡Hola, Mundo!'));

while ($row = $resultado ->fetch_assoc()){
    $pdf->Cell(20,10, $row['idproducto'],1,0,'C',0);
    $pdf->Cell(50,10, $row['Producto_Nombre'],1,0,'C',0);
    $pdf->Cell(30,10, $row['Producto_tipo'],1,0,'C',0);
    $pdf->Cell(25,10, $row['Producto_cantidad_actual'],1,0,'C',0);
    $pdf->Cell(28,10, $row['Producto_precio'],1,0,'C',0);
    $pdf->Cell(38,10, $row['Producto_fecha_entrada'],1,1,'C',0);
}



$pdf->Output();
?>