<?php

require "../Controlador/conexion.php";


$id=$_GET["ID"];

$sql="DELETE FROM ventas  WHERE idVentas ='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location:../Vista/php/Mod_Ventas.php");
    }
?>
