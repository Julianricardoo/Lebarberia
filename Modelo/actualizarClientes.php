
         
<!--------------------------------AGREGAR---------------------------------------------------->                      

          <?php 
                require "../Controlador/conexion.php";
    
    
                  if(isset($_POST["nombreCliente"])){
                      
                 
                  
                      $nombre = $_POST["nombreCliente"];
                      $telefono = $_POST["telefonoCliente"];
                      $direccion = $_POST["direccionCliente"];                  
                  
                  $query = "INSERT INTO clientes (Cliente_nombres,Cliente_telefono,Cliente_direccion) 
                      VALUES('$nombre','$telefono','$direccion')";

                  $result = mysqli_query($mysqli,$query); 
                    header("location:../Vista/php/clientes.php");
                  }?>

                   




<!--------------------------------ACTUALIZAR---------------------------------------------------->                      



<?php 
     require "../Controlador/conexion.php";


    $query1 = mysqli_query($mysqli, "SELECT Proveedor_ID, Proveedor_Nombre FROM proveedor");
    $query2 = mysqli_query($mysqli, "SELECT idproducto, Producto_Nombre FROM inventario");

     $id=$_GET['ID'];

     $sql2= "SELECT * FROM clientes WHERE Cliente_ID='$id'";
     $query3=mysqli_query($mysqli,$sql2);
     $raw=mysqli_fetch_array($query3);
    
          

    // $sql = "SELECT Pedidos_ID, proveedor.Proveedor_Nombre as nombre_proveedor,
    // inventario.Producto_Nombre as nombre_producto, Fecha_Pedido, Cantidad_Pedido,
    // Valor_Pedido
    // FROM pedidos 
    // INNER JOIN proveedor ON pedidos.Proveedor_ID=proveedor.Proveedor_ID
    // INNER JOIN inventario ON pedidos.Producto_ID =inventario.idproducto 
    // WHERE Pedidos_ID='$id'";
    // $query=mysqli_query($mysqli,$sql);
    // $row=mysqli_fetch_array($query); 
 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../Vista/CSS/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
         rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
         crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="updateCliente.php" method="POST">
                                 
                                <input type="hidden" name="id" value="<?php echo $raw['Cliente_ID']  ?>">
                                <input type="text" class="form-control mb-3" name="nombreCliente" id="nombreCliente" placeholder="nombre Cliente" value="<?php echo $raw['Cliente_nombres']  ?>">
                                <input type="number" class="form-control mb-3" name="telefonoCliente" id="telefonoCliente"  placeholder="telefono Cliente" value="<?php echo $raw['Cliente_telefono']  ?>">
                                <input type="text" class="form-control mb-3" name="direccionCliente" id="direccionCliente"  placeholder="direccion Cliente" value="<?php echo $raw['Cliente_direccion']  ?>">

                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>