<?php

require "../Controlador/conexion.php";


$id=$_GET['ID'];

$sql="DELETE FROM clientes WHERE Cliente_ID='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location:../Vista/php/clientes.php");
    }
?>
