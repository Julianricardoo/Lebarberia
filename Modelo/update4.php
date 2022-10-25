<?php

include("../Controlador/conexion.php");


$id=$_POST['id'];
$nombres=$_POST['nombres'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];
$eps=$_POST['eps'];
$edad=$_POST['edad'];
$salario=$_POST['salario'];

$sql="UPDATE empleados SET  Emple_nombres='$nombres',Emple_telefono='$telefono',Emple_direccion='$direccion',
Emple_eps='$eps',Emple_fech_nacimiento='$edad',Emple_salario='$salario' WHERE Emple_ID='$id'";
$query=mysqli_query($mysqli,$sql);

    if($query){
        Header("Location:../Vista/php/empleados.php");
    }
?>