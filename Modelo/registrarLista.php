<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>registro</title>
</head>
<body>
   <?php 
    if(isset($_POST["submit"])){
        header("location: ../Vista/php/empleados.php");
    }

   //$server = 'sql200.byethost6.com'
   //$usuario = 'b6_29406732'
   //$contrasenia ='Lebarberia'
   //$bd ='b6_29406732_bd_lebarberia'


    $server = "localhost";
    $usuario = "root";
    $contrasenia = "";
    $bd = "lebarberia";

    $conexion = mysqli_connect($server, $usuario, $contrasenia, $bd)
        or die("error en la conexion");
    
    
     $nombre = $_POST["nombre"];
     $telefono = $_POST["telefono"];
     $direccion = $_POST["direccion"];
     $eps = $_POST["eps"];
     $fecha_nacimiento = $_POST["fecha_nacimiento"];
     $salario = $_POST["salario"];
    
       /*  echo "$nombre";
        echo "$telefono";
        echo "$direccion";
        echo "$eps";
        echo "$fecha_nacimiento";
         echo "$salario";
    
    */
    
    $insertar = "INSERT INTO empleados (Emple_nombres,Emple_telefono,Emple_direccion,Emple_eps,Emple_fech_nacimiento,Emple_salario) VALUES('$nombre','$telefono','$direccion','$eps','$fecha_nacimiento','$salario')";
    
//    INSERT INTO `table_name` (column_1, column_2, ...) VALUES (value_1, value_2, ...);
    
    $resultado = mysqli_query($conexion, $insertar);
       
      
    
    mysqli_close($conexion);
    echo "datos insertados correctamente";
    
    
    ?>
    <button type="submit" name="" id=""><a href="../Vista/php/empleados.php">Volver</a></button>
    
    
</body>
</html>