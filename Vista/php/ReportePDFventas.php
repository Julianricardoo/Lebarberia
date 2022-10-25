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
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(40,10,'Reporte Ventas',0,0,'C');
    // Salto de línea
    $this->Ln(20);
    //$this->Cell(15,10,utf8_decode( 'N°'),1,0,'C',0);
    $this->Cell(40,10, 'Empleado',1,0,'C',0);
    $this->Cell(38,10, 'Cliente',1,0,'C',0);
    $this->Cell(42,10, 'Producto',1,0,'C',0);
    $this->Cell(30,10, 'Fecha',1,0,'C',0);
    $this->Cell(23,10, 'Cantidad',1,0,'C',0);
    $this->Cell(25,10, 'Precio',1,1,'C',0);
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',6);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require "../../Controlador/conexion.php";
    $consulta = "SELECT idVentas, empleados.Emple_nombres as nombre_empleado, clientes.Cliente_nombres as nombre_cliente,
                           inventario.Producto_Nombre as nombre_producto, Venta_fecha,Venta_cant, Vent_Valor FROM ventas 
            INNER JOIN empleados ON ventas.Emple_ID = empleados.Emple_ID 
            INNER JOIN clientes ON ventas.Cliente_ID = clientes.Cliente_ID
            INNER JOIN inventario ON ventas.idproducto = inventario.idproducto";
    $resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
//$pdf->Cell(40,10, utf8_decode('¡Hola, Mundo!'));

while ($row = $resultado ->fetch_assoc()){
    //$pdf->Cell(15,10, $row['idVentas'],1,0,'C',0);
    $pdf->Cell(40,10, $row['nombre_empleado'],1,0,'C',0);
    $pdf->Cell(38,10, $row['nombre_cliente'],1,0,'C',0);
    $pdf->Cell(42,10, $row['nombre_producto'],1,0,'C',0);
    $pdf->Cell(30,10, $row['Venta_fecha'],1,0,'C',0);
    $pdf->Cell(23,10, $row['Venta_cant'],1,0,'C',0);
    $pdf->Cell(25,10, $row['Vent_Valor'],1,1,'C',0);
    
}



$pdf->Output();
?>