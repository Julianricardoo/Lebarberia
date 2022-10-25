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
     
   
    
    $resultado = ("SELECT * FROM proveedor WHERE Proveedor_ID LIKE '$where'                                         OR  Proveedor_Nombre LIKE '%".$where."%'
                      OR  Proveedor_Telefono LIKE '%".$where."%' 
                      OR  Proveedor_Direccion LIKE '%".$where."%' 
                      OR  Proveedor_Email LIKE '%".$where."%' ");
    
    $result  = mysqli_query($conexion, $resultado);

     

?>