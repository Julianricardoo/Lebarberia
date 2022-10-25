<?php
require '../pdf/fpdf.php';

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
    $this->Cell(40,10,'Reporte Pedidos',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(20,10,utf8_decode( 'N°'),1,0,'C',0);
    $this->Cell(50,10, 'Proveedor',1,0,'C',0);
    $this->Cell(38,10, 'Producto',1,0,'C',0);
    $this->Cell(32,10, 'Fecha',1,0,'C',0);
    $this->Cell(23,10, 'Cantidad',1,0,'C',0);
    $this->Cell(30,10, 'Valor',1,1,'C',0);
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
    $consulta = "SELECT Pedidos_ID, proveedor.Proveedor_Nombre as nombre_proveedor, 
                           inventario.Producto_Nombre as Producto_Nombre, Fecha_Pedido, Cantidad_Pedido, Valor_Pedido FROM pedidos 
            INNER JOIN proveedor ON pedidos.Proveedor_ID = proveedor.Proveedor_ID  
            INNER JOIN inventario ON pedidos.Producto_ID = inventario.idproducto";
    $resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
//$pdf->Cell(40,10, utf8_decode('¡Hola, Mundo!'));

while ($row = $resultado ->fetch_assoc()){
    $pdf->Cell(20,10, $row['Pedidos_ID'],1,0,'C',0);
    $pdf->Cell(50,10, $row['nombre_proveedor'],1,0,'C',0);
    $pdf->Cell(38,10, $row['Producto_Nombre'],1,0,'C',0);
    $pdf->Cell(32,10, $row['Fecha_Pedido'],1,0,'C',0);
    $pdf->Cell(23,10, $row['Cantidad_Pedido'],1,0,'C',0);
    $pdf->Cell(30,10, $row['Valor_Pedido'],1,1,'C',0);
    
}



$pdf->Output();
?>