<?php
//$host="sql200.byethost6.com";
//$bd="b6_29406732_bd_lebarberia";
//$usuario="b6_29406732";
//$contrasenia="Lebarberia";


$server = "localhost";
    $usuario = "root";
    $contrasenia = "";
    $bd = "lebarberia";

try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contrasenia);
    if($conexion){ echo "Conectado";}
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>