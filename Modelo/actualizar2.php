<?php 
    include("../Controlador/conexion.php");
    /*$sql1 = "SELECT * FROM proveedor WHERE Proveedor_ID  ='$id'";
    $query3=mysqli_query($mysqli,$sql1); 
    $raw=mysqli_fetch_array($query3);  
*/
    $query1 = mysqli_query($mysqli, "SELECT Proveedor_ID, Proveedor_Nombre FROM proveedor");
    $query2 = mysqli_query($mysqli, "SELECT idproducto, Producto_Nombre FROM inventario");

    $id=$_GET['ID'];
     $sql2= "SELECT * FROM pedidos WHERE Pedidos_ID='$id'";
     $query3=mysqli_query($mysqli,$sql2);
     $raw=mysqli_fetch_array($query3);
    //$id=$_GET['ID'];
    //$sql= "SELECT * FROM pedidos WHERE Pedidos_ID='$id'";
          

    $sql = "SELECT Pedidos_ID, proveedor.Proveedor_Nombre as nombre_proveedor,
    inventario.Producto_Nombre as nombre_producto, Fecha_Pedido, Cantidad_Pedido,
    Valor_Pedido
    FROM pedidos 
    INNER JOIN proveedor ON pedidos.Proveedor_ID=proveedor.Proveedor_ID
    INNER JOIN inventario ON pedidos.Producto_ID =inventario.idproducto 
    WHERE Pedidos_ID='$id'";
    $query=mysqli_query($mysqli,$sql);
    $row=mysqli_fetch_array($query); 
    

   
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
                    <form action="update2.php" method="POST">
                                 
                                <input type="hidden" name="id" value="<?php echo $row['Pedidos_ID']  ?>">

                                 <select  name="select_proveedor" id="select_proveedor" class="form-control mb-3" >
                                    <option value="<?php echo $raw["Proveedor_ID"]?>"><?php echo $row["nombre_proveedor"]?></option>
                                     <?php while ($datosProvedor = mysqli_fetch_array($query1)){ ?>
                                     <option value="<?php echo $datosProvedor["Proveedor_ID"]?>"><?php echo $datosProvedor["Proveedor_Nombre"]; ?></option>
                                     <?php }?>
                                    </select>

                             
                                 <select name="select_producto" id="select_producto" class="form-control mb-3">
                                     <option value="<?php echo $raw["Producto_ID"]?>"><?php echo $row["nombre_producto"]; ?></option>
                                      <?php while($datosProducto = mysqli_fetch_array($query2)){?>
                                        <option value="<?php echo $datosProducto["idproducto"]?>"><?php echo $datosProducto["Producto_Nombre"]; ?></option> 
                                      <?php  }  ?>
                                  </select>
                                 
                                <input type="date" class="form-control mb-3" name="fecha" id="fecha" placeholder="fecha" value="<?php echo $row['Fecha_Pedido']  ?>">
                                <input type="number" class="form-control mb-3" name="cantidad" id="cantidad"  placeholder="cantidad" value="<?php echo $row['Cantidad_Pedido']  ?>">
                                <input type="text" class="form-control mb-3" name="precio" id="precio" placeholder="precio" value="<?php echo $row['Valor_Pedido']  ?>">
        
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
    
                </div>
    </body>
</html>