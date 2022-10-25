<?php 
    require "../Controlador/conexion.php";

     $id=$_GET['ID'];

     $sql2= "SELECT * FROM proveedor WHERE Proveedor_ID ='$id'";
     $query3=mysqli_query($mysqli,$sql2);
     $raw=mysqli_fetch_array($query3);
    

?>

<!DOCTYPE html>
<html lang="es">
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
                    <form action="updateProveedor.php" method="POST">
                                 
                                <input type="hidden" name="id" value="<?php echo $raw['Proveedor_ID']  ?>">
                                <input type="text" class="form-control mb-3" name="nombreAct" id="username" placeholder="nombre" value="<?php echo $raw['Proveedor_Nombre']  ?>">
                                <input type="number" class="form-control mb-3" name="telefonoAct" id="telefonoAct"  placeholder="telefono" value="<?php echo $raw['Proveedor_Telefono']  ?>">
                                <input type="text" class="form-control mb-3" name="direccionAct" id="direccionAct"  placeholder="direccion" value="<?php echo $raw['Proveedor_Direccion']  ?>">
                                <input type="text" class="form-control mb-3" name="emailAct" id="emailAct"  placeholder="email" value="<?php echo $raw['Proveedor_Email']  ?>">
                      
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>