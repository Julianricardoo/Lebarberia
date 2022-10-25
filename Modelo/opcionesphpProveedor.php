<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>php agregar,actualizar, eliminar, consultar</title>
</head>
<body>

         
<!--------------------------------AGREGAR---------------------------------------------------->                      

          <?php 
                 require "../Controlador/conexion.php";
                    if(isset($_POST["nombreAct"])){
       
                      $nombre = $_POST["nombreAct"];
                      $telefono = $_POST["telefonoAct"];
                      $direccion = $_POST["direccionAct"];  
                      $email = $_POST["emailAct"]; 
                      
                      
                  $query = "INSERT INTO proveedor (Proveedor_Nombre,Proveedor_Telefono,Proveedor_Direccion,Proveedor_Email) VALUES('$nombre','$telefono','$direccion','$email')";

                  $result = mysqli_query($mysqli,$query); 
                      
                    header("location:../Vista/php/proveedores.php");
                      
                    } ?>

                   


<!--------------------------------ACTUALIZAR---------------------------------------------------->                      



<?php
                    
    //$server = "localhost";
    //$usuario = "root";
    //$contrasenia = "";
    //$bd = "lebarberia";

    //$conexion = mysqli_connect($server, $usuario, $contrasenia, $bd)
        //or die ("error en la conexion");
    
                      //$idProveedor = $_POST["idProveedor"];
                      //$nombre = $_POST["nombreAct"];
                      //$telefono = $_POST["telefonoAct"];
                      //$direccion = $_POST["direccionAct"];  
                      //$email = $_POST["emailAct"];
                      
                      //$sql_editar = "UPDATE proveedor SET Proveedor_Nombre='$nombre', Proveedor_Telefono='$telefono', Proveedor_Direccion='$direccion',Proveedor_Email='$email' WHERE Proveedor_ID ='$idProveedor'"; 
    
                    //$sql_query  = mysqli_query($conexion, $sql_editar);
                      
                       //header("location:proveedores.php");
    
        ?>
                      
<!--------------------------------ELIMINAR---------------------------------------------------->                      
                      
                      
            
 <?php 
     
                 //$server = "localhost";
                 //$usuario = "root";
                 //$contrasenia = "";
                 //$bd = "lebarberia";

                 //$conexion = mysqli_connect($server, $usuario, $contrasenia, //$bd)
                 //or die ("error en la conexion");
    
                        
                        //$clave = $_POST["numDelete"]; 
    
                        //mysqli_query($conexion, "DELETE FROM proveedor WHERE Proveedor_ID  ='$clave'");                         
                          //header("location:proveedores.php");
                            
           ?>
    
                      
<!--------------------------------CONSULTAR---------------------------------------------------->    






    

    
</body>
</html>