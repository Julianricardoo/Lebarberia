<?php

require "../Controlador/conexion.php";


$id=$_POST['id'];

$empleado=$_POST['select_empleado'];
$cliente=$_POST['select_cliente'];
$producto=$_POST['select_producto'];
$fecha=$_POST['FECHA'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['PRECIO'];

$sql="UPDATE ventas SET  Emple_ID ='$empleado',Cliente_ID ='$cliente',
idproducto ='$producto', Venta_fecha='$fecha', Venta_cant='$cantidad', Vent_Valor='$precio' 
WHERE idVentas ='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location:../Vista/php/Mod_Ventas.php");
    }
?>