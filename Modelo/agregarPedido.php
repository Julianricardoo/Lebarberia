<?php

include("../Controlador/conexion.php");


	
    $idPedido = $_POST["Pedidos_ID"];
	$idProveedor = $_POST['select_proveedor'];
    $idProducto = $_POST['select_producto'];
    $fechaVenta = $_POST['FECHA'];
    $cantidad =$_POST["cantidad"];
    $valor = $_POST['PRECIO'];

	/*echo $idempleado
	echo $idcliente;
	echo $idproducto;
	echo $fechaventa;
	echo $producto;
	echo $valor;*/
//die();

    $query = "INSERT INTO pedidos (	Proveedor_ID ,Producto_ID ,Fecha_Pedido,Cantidad_Pedido, Valor_Pedido) 
	          VALUES('$idProveedor','$idProducto','$fechaVenta','$cantidad','$valor')";
    
	$result = mysqli_query($mysqli,$query);

	
	
	if($query){
        Header("Location:../Vista/php/Pedido.php");
    }
	

?>
