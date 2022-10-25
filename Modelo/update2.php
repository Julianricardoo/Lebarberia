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

$proveedor=$_POST['select_proveedor'];
$producto=$_POST['select_producto'];
$fecha=$_POST['fecha'];
$cantidad=$_POST['cantidad'];
$precio=$_POST['precio'];

// echo $proveedor;
// echo $producto;
// echo $fecha;
// echo $cantidad;
// echo $precio;



$sql="UPDATE pedidos SET  Proveedor_ID='$proveedor', Producto_ID ='$producto',
 Fecha_Pedido='$fecha', Cantidad_Pedido='$cantidad', Valor_Pedido='$precio'
  WHERE Pedidos_ID='$id'";
$query = mysqli_query($conexion,$sql);
 echo "actualizado con exito";
    if($query){
        Header("Location:../Vista/php/pedido.php");
    }

?>