<?php

require "../Controlador/conexion.php";


$id=$_GET['ID'];

$sql="DELETE FROM usuarios WHERE id ='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location:../Vista/php/usuarios.php");
    }
?>
