<?php

include "../Controlador/conexion.php";


$id=$_GET['ID'];

$sql="DELETE FROM empleados WHERE Emple_ID='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location:../Vista/php/empleados.php");
    }
?>
