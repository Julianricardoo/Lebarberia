<?php

    $server = "localhost";
    $usuario = "root";
    $contrasenia = "";
    $bd = "lebarberia";

   //$server = 'sql200.byethost6.com'
   //$usuario = 'b6_29406732'
   //$contrasenia ='Lebarberia'
   //$bd ='b6_29406732_bd_lebarberia'


    $conexion = mysqli_connect($server, $usuario, $contrasenia, $bd)
        or die ("error en la conexion");

$id=$_POST['id'];

$nombre=$_POST['nombreCliente'];
$telefono=$_POST['telefonoCliente'];
$direccion=$_POST['direccionCliente'];



$sql="UPDATE clientes SET  Cliente_nombres='$nombre', Cliente_telefono ='$telefono',
 Cliente_direccion='$direccion' WHERE Cliente_ID ='$id'";
$query = mysqli_query($conexion,$sql);
 echo "actualizado con exito";
    if($query){
         header("location:../Vista/php/clientes.php");
    }

?>