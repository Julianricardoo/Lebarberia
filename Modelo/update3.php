<?php

require "../Controlador/conexion.php";

$id=$_POST['id'];
$producto=$_POST['producto'];
$descripcion=$_POST['descripcion'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];
$fecha=$_POST['fecha'];

$sql="UPDATE inventario SET  Producto_Nombre='$producto',Producto_tipo='$descripcion',Producto_cantidad_actual='$cantidad',
Producto_precio='$precio',Producto_fecha_entrada='$fecha' WHERE idproducto='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location: ../Vista/php/inventario.php");
    }
?>