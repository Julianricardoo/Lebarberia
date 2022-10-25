<?php 
    include("../Controlador/conexion.php");
    

$id=$_GET['ID'];

$sql="SELECT * FROM empleados WHERE Emple_ID='$id'";
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
            <form action="update4.php" method="POST">
                    
                         <input type="hidden" name="id" value="<?php echo $row['Emple_ID']  ?>">
                                
                         <input type="text" class="form-control mb-3" name="nombres" placeholder="nombres" value="<?php echo $row['Emple_nombres']  ?>">
                         <input type="number" class="form-control mb-3" name="telefono" placeholder="telefono" value="<?php echo $row['Emple_telefono']  ?>">
                         <input type="text" class="form-control mb-3" name="direccion" placeholder="direccion" value="<?php echo $row['Emple_direccion']  ?>">
                         <input type="text" class="form-control mb-3" name="eps" placeholder="eps" value="<?php echo $row['Emple_eps']  ?>">
                         <input type="date" class="form-control mb-3" name="edad" placeholder="edad" value="<?php echo $row['Emple_fech_nacimiento']  ?>">
                         <input type="text" class="form-control mb-3" name="salario" placeholder="salario" value="<?php echo $row['Emple_salario']  ?>">
                                
                         <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form> 
             </div>
    </body>
</html>