<?php
    
   //$server = 'sql200.byethost6.com'
   //$usuario = 'b6_29406732'
   //$contrasenia ='Lebarberia'
   //$bd ='b6_29406732_bd_lebarberia'

    $server = "localhost";
    $usuario = "root";
    $contrasenia = "";
    $bd = "lebarberia";

    $conexion = mysqli_connect($server, $usuario, $contrasenia, $bd)
        or die ("error en la conexion");

$id=$_POST['id'];

$usuario=$_POST['username'];
$password=$_POST['password'];
$rol=$_POST['select_Usuario'];

// echo $proveedor;
// echo $producto;
// echo $fecha;
// echo $cantidad;
// echo $precio;

$sql="UPDATE usuarios SET usuario='$usuario', passwordUsuario='$password', nombre='$rol' WHERE id='$id'";
$query = mysqli_query($conexion,$sql);

    if($query){
        Header("Location:../Vista/php/usuarios.php");
    }


?>