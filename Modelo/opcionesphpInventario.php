<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>php agregar,actualizar, eliminar</title>
</head>
<body>

         
<!--------------------------------AGREGAR---------------------------------------------------->                      

          <?php 
                 require "../Controlador/conexion.php";
                    if(isset($_POST["nombreAct"])){
       
                      $nombre = $_POST["nombreAct"];
                      $tipo = $_POST["tipoAct"];
                      $cantIngre = $_POST["cantActualAct"];  
                      $cantActual = $_POST["cantActualAct"]; 
                      $Precio = $_POST["productoPrecio"]; 
                      $fechaIngre = $_POST["fechaEntraAct"]; 
                      
                      
                  $query = "INSERT INTO inventario (Producto_Nombre,Producto_tipo,
                  Producto_cantidad_actual, producto_precio, Producto_fecha_entrada) VALUES('$nombre','$tipo','$cantIngre','$Precio','$fechaIngre')";
                        
                    /*$sql_sum="INSERT Producto_cantidad_ingreso, Producto_cantidad_actual, (Producto_cantidad_ingreso + Producto_cantidad_actual) AS Producto_cantidad_total  FROM `inventario` GROUP BY idproducto , Producto_Nombre, Producto_tipo;";*/
                        
                  $result = mysqli_query($mysqli,$query); 
                       // $sum = mysqli_query($mysqli,$sql_sum);
                      
                   
                         Header("Location:../Vista/php/inventario.php");
                      
                    } ?>

                   


<!--------------------------------ACTUALIZAR---------------------------------------------------->                      

                                          
<?php
    //$server = sql200.byethost6.com'
   //$usuario = 'b6_29406732'
   //$contrasenia ='Lebarberia'
   //$bd ='b6_29406732_bd_lebarberia'

    
    ////$server = "localhost";
    ////$usuario = "root";
    ////$contrasenia = "";
    ////$bd = "lebarberia";

    //$conexion = mysqli_connect($server, $usuario, $contrasenia, $bd)
        //or die ("error en la conexion");
                     
                      //$idProducto = $_POST["idProductoAct"];
                      //$nombre = $_POST["nombreAct"];
                      //$tipo = $_POST["tipoAct"];
                      //$cantIngre = $_POST["cantIngreAct"];  
                      //$cantActual = $_POST["cantActualAct"]; 
                      //$fechaIngre = $_POST["fechaEntraAct"]; 
       
                      
                      //$sql_editar = "UPDATE inventario SET Producto_Nombre='$nombre', Producto_tipo='$tipo', Producto_cantidad_ingreso='$cantIngre',Producto_fecha_entrada='$fechaIngre' WHERE idproducto ='$idProducto'";
                   

                      //$sql_query  = mysqli_query($conexion, $sql_editar);
                   
                      
                       //header("location:inventario.php");
    
                    ?>
                      
<!--------------------------------ELIMINAR---------------------------------------------------->                      
                      
                      
            
 <?php 
                
    //$server = sql200.byethost6.com'
   //$usuario = 'b6_29406732'
   //$contrasenia ='Lebarberia'
   //$bd ='b6_29406732_bd_lebarberia'

                 //$server = "localhost";
                 //$usuario = "root";
                 //$contrasenia = "";
                 //$bd = "lebarberia";

                 //$conexion = mysqli_connect($server, $usuario, $contrasenia, //$bd)
                 //or die ("error en la conexion");
    
                        
                        //$clave = $_POST["numDelete"]; 
    
                        //mysqli_query($conexion, "DELETE FROM inventario WHERE idproducto  ='$clave'");                         
                    //header("location:inventario.php");
                            
           ?>
    
                      
<!--------------------------------CONSULTAR---------------------------------------------------->    






    

    
</body>
</html>