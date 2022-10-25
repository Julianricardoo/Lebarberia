<?php

require "../Controlador/conexion.php";

	//$idventa = $_POST['idVentas'];
    
	$idempleado = $_POST['select_empleado'];
	$idcliente = $_POST['select_cliente'];
    $idproducto = $_POST['select_producto'];
    $fechaventa = $_POST['FECHA'];
    $cantidad =$_POST["cantidadProducto"];
    $valor = $_POST['PRECIO'];

	/*echo $idempleado
	echo $idcliente;
	echo $idproducto;
	echo $fechaventa;
	echo $producto;
	echo $valor;*/

    
//echo $idempleado,$idcliente,$idproducto,$fechaventa,$producto,$valor;
//die();

    $query = "INSERT INTO ventas (Emple_ID,Cliente_ID,idproducto,Venta_fecha,Venta_cant, Vent_Valor) 
	          VALUES('$idempleado','$idcliente','$idproducto','$fechaventa','$cantidad','$valor')";
    
	$result = mysqli_query($mysqli,$query);

	//echo 'saved';
	
	if($query){
        Header("Location: ../Vista/php/Mod_Ventas.php");
    }

?>
<!-- <button type="submit" name="" id=""><a href="Mod_Ventas.php">Volver</a></button> -->


