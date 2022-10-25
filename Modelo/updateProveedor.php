<?php
    $server = 'sql200.byethost6.com'
   $usuario = 'b6_29406732'
   $contrasenia ='Lebarberia'
   $bd ='b6_29406732_bd_lebarberia'

    //$server = "localhost";
    //$usuario = "root";
    //$contrasenia = "";
    //$bd = "lebarberia";

    $conexion = mysqli_connect($server, $usuario, $contrasenia, $bd)
        or die ("error en la conexion");

$id=$_POST['id'];

$proveedor=$_POST['nombreAct'];
$telefono=$_POST['telefonoAct'];
$direccion=$_POST['direccionAct'];
$email=$_POST['emailAct'];


$sql="UPDATE proveedor SET  Proveedor_Nombre='$proveedor', Proveedor_Telefono ='$telefono',
 Proveedor_Direccion='$direccion', Proveedor_Email='$email'
  WHERE Proveedor_ID='$id'";

$query = mysqli_query($conexion,$sql);
 echo "actualizado con exito";
    if($query){
        Header("Location:../Vista/php/proveedores.php");
    }

?>