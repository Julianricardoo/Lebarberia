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
     
    
    $resultado = ("SELECT * FROM usuarios 
    WHERE id LIKE '$where' 
    OR  usuario LIKE '%".$where."%'
    OR  nombre LIKE '%".$where."%' ");

    $sql_query  = mysqli_query($conexion, $resultado);

   

?>