 
  <?php

    //$server = "sql200.byethost6.com";
    //$usuario = "b6_29406732";
    //$contrasenia = "Lebarberia";
    //$bd = "b6_29406732_bd_lebarberia";

    $server = "localhost";
    $usuario = "root";
    $contrasenia = "";
    $bd = "lebarberia";


    $conexion = mysqli_connect($server, $usuario, $contrasenia, $bd)
        or die("error en la conexion");
    
    

    $where = $_POST["inputConsulta"];     
     
    
    $resultado = ("SELECT idVentas, empleados.Emple_nombres as nombre_empleado, clientes.Cliente_nombres as nombre_cliente,
                           inventario.Producto_Nombre as nombre_producto, Venta_fecha,Venta_cant, Vent_Valor FROM ventas 
                    INNER JOIN empleados ON ventas.Emple_ID =empleados.Emple_ID 
                    INNER JOIN clientes ON ventas.Cliente_ID =clientes.Cliente_ID
                    INNER JOIN inventario ON ventas.idproducto = inventario.idproducto 
            
                     WHERE idVentas LIKE '$where' 
                     OR Vent_Valor LIKE '%".$where."%' 
                     OR Emple_nombres  LIKE '%".$where."%' 
                     OR Cliente_nombres  LIKE '%".$where."%' 
                     OR Producto_Nombre  LIKE '%".$where."%' 
                     OR Venta_fecha  LIKE '%".$where."%' 
                     OR Venta_cant  LIKE '%".$where."%' ");

    $result  = mysqli_query($conexion, $resultado);

   

?>