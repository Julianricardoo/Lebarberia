<?php


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

  
        
    $where = $_POST["inputConsul"]; 
    
    $resultado = ("SELECT * FROM empleados WHERE Emple_ID LIKE '$where'
                    OR  Emple_nombres LIKE '%".$where."%'
                    OR  Emple_telefono LIKE '%".$where."%' 
                    OR  Emple_direccion LIKE '%".$where."%'
                    OR  Emple_eps LIKE '%".$where."%' 
                    OR  Emple_fech_nacimiento LIKE '%".$where."%' 
                    OR  Emple_salario LIKE '%".$where."%' ");


        $sql_query  = mysqli_query($conexion, $resultado);
    

?>





























