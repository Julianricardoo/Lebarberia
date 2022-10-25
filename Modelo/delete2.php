<?php

include("../Controlador/conexion.php");


$id=$_GET["Pedidos_ID"];

$sql="DELETE FROM pedidos WHERE Pedidos_ID='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location:../Vista/php/pedido.php");
    }
?>
