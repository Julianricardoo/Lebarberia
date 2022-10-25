<?php

require "../Controlador/conexion.php";


$id=$_GET['ID'];

$sql="DELETE FROM proveedor WHERE Proveedor_ID  ='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location:../Vista/php/proveedores.php");
    }
?>
