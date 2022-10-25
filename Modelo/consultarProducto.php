  <?php


    $server = "sql200.byethost6.com";
    $usuario = "b6_29406732";
    $contrasenia = "Lebarberia";
    $bd = "b6_29406732_bd_lebarberia";

    //$server = "localhost";
    //$usuario = "root";
    //$contrasenia = "";
    //$bd = "lebarberia";


    $conexion = mysqli_connect($server, $usuario, $contrasenia, $bd)
        or die("error en la conexion");
    
    

    $where = $_POST["inputConsulta"];     
     
    
    $resultado = ("SELECT * FROM inventario WHERE idproducto  LIKE '$where' 
                        OR Producto_Nombre LIKE '%".$where."%'
                        OR Producto_tipo LIKE '%".$where."%'
                        OR Producto_cantidad_actual LIKE '%".$where."%' 
                        OR Producto_precio LIKE '%".$where."%' 
                        OR Producto_fecha_entrada LIKE '%".$where."%' ");

    $result  = mysqli_query($conexion, $resultado);


?>