<?php

require "../Controlador/conexion.php";


$id=$_GET['ID'];

$sql="DELETE FROM inventario  WHERE idproducto='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location:../Vista/php/inventario.php");
    }
?>
