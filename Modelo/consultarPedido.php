//<?php

    //$server = "sql200.byethost6.com";
    //$usuario = "b6_29406732";
    //$contrasenia = "Lebarberia";
    //$bd = "b6_29406732_bd_lebarberia";

     $server = "localhost";
     $usuario =   "root";
     $contrasenia =   "";
     $bd = "lebarberia";
    
    $conexion = mysqli_connect($server, $usuario, $contrasenia, $bd)
        or die("error en la conexion");
  
    
    $where = $_POST["ConsultaPedido"]; 
    
    
    $resultado = ("SELECT Pedidos_ID, proveedor.Proveedor_Nombre as nombre_proveedor, inventario.Producto_Nombre as Producto_Nombre, Fecha_Pedido, Cantidad_Pedido, Valor_Pedido FROM pedidos INNER JOIN proveedor ON pedidos.Proveedor_ID = proveedor.Proveedor_ID  
                        INNER JOIN inventario ON pedidos.Producto_ID = inventario.idproducto    
                        WHERE 	Pedidos_ID LIKE '$where' 
                           OR  Proveedor_Nombre LIKE '%".$where."%' 
                           OR  Producto_Nombre LIKE '%".$where."%' 
                           OR Fecha_Pedido LIKE '%".$where."%'
                           OR Cantidad_Pedido LIKE '%".$where."%' 
                           OR Valor_Pedido LIKE '%".$where."%' ");


        $result  = mysqli_query($conexion, $resultado);
        
 
?>















