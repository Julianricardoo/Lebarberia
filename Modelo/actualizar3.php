<?php 
    require "../Controlador/conexion.php";
  

$id=$_GET['ID'];

$sql="SELECT * FROM inventario WHERE idproducto='$id'";
$query=mysqli_query($mysqli,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../Vista/CSS/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update3.php" method="POST">
                    
                                <input type="hidden" name="id" value="<?php echo $row['idproducto']  ?>">
                                <input type="text" class="form-control mb-3" name="producto" placeholder="producto" value="<?php echo $row['Producto_Nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="descripcion" placeholder="descripcion" value="<?php echo $row['Producto_tipo']  ?>">
                                <input type="number" class="form-control mb-3" name="cantidad" placeholder="cantidad" value="<?php echo $row['Producto_cantidad_actual']  ?>">
                                <input type="text" class="form-control mb-3" name="precio" placeholder="precio" value="<?php echo $row['Producto_precio']  ?>">
                                <input type="date" class="form-control mb-3" name="fecha" placeholder="fecha" value="<?php echo $row['Producto_fecha_entrada']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>