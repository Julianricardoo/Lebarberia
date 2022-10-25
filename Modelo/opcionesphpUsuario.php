//<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>php agregar,actualizar, eliminar</title>
</head>
<body>

         
<!--------------------------------AGREGAR---------------------------------------------------->                      

         
<?php

  require "../Controlador/conexion.php";
     if (isset($_POST["usernameAct"])) {    
                     
         $UserName = $_POST["usernameAct"];
         $password = $_POST["password"];
         $role = $_POST["role"];                        
      

    $query  = "INSERT INTO usuarios (usuario,passwordUsuario,nombre) VALUES ('$UserName','$password','$role')";
      
     $result  = mysqli_query($mysqli, $query);
     
    header("location:../Vista/php/usuarios.php");  
    }                    
?>

<!--------------------------------ACTUALIZAR---------------------------------------------------->                      

           
<!--------------------------------ELIMINAR---------------------------------------------------->                      
                      
                      
 
    
</body>
</html>