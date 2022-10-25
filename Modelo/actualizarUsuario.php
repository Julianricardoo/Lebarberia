<?php 
    require "../Controlador/conexion.php";


    // $query1 = mysqli_query($mysqli, "SELECT Proveedor_ID, Proveedor_Nombre FROM proveedor");
    // $query2 = mysqli_query($mysqli, "SELECT idproducto, Producto_Nombre FROM inventario");

     $id=$_GET['ID'];

     $sql2= "SELECT * FROM usuarios WHERE id='$id'";
     $query3=mysqli_query($mysqli,$sql2);
     $raw=mysqli_fetch_array($query3);
    
          

     //$sql = "SELECT Pedidos_ID, proveedor.Proveedor_Nombre as nombre_proveedor,
     //inventario.Producto_Nombre as nombre_producto, Fecha_Pedido, Cantidad_Pedido,
     //Valor_Pedido
     //FROM pedidos 
     //INNER JOIN proveedor ON pedidos.Proveedor_ID=proveedor.Proveedor_ID
     //INNER JOIN inventario ON pedidos.Producto_ID =inventario.idproducto 
     //WHERE Pedidos_ID='$id'";
     //$query=mysqli_query($mysqli,$sql);
     //$row=mysqli_fetch_array($query); 
    

   
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
                    <form action="updateUsuario.php" method="POST">
                                 
                                <input type="hidden" name="id" value="<?php echo $raw['id']  ?>">
                                <input type="text" class="form-control mb-3" name="username" id="username" placeholder="username" value="<?php echo $raw['usuario']  ?>">
                                <input type="password" class="form-control mb-3" name="password" id="password"  placeholder="Password" value="<?php echo $raw['passwordUsuario']  ?>">
                                
                                <select  name="select_Usuario" id="select_Usuario" class="form-control mb-3" >
                                        <option value="<?php echo $raw["id"]?>"><?php echo $raw["nombre"]?></option>
                                        <option value="Super_admin">Admin</option>
                                        <option value="Gerente">Gerente</option>
                                        <option value="Empleado">Empleado</option>
                                    </select>
                                    <input type="password" class="form-control mb-3" name="password" id="password"  placeholder="Password" value="<?php echo $raw['passwordUsuario']  ?>">
                                    
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>