<?php 
    require "../Controlador/conexion.php";
    $query1 = mysqli_query($mysqli, "SELECT Emple_ID, Emple_nombres FROM empleados");
    $query2 = mysqli_query($mysqli, "SELECT Cliente_ID, Cliente_nombres FROM clientes");
    $query3 = mysqli_query($mysqli, "SELECT idproducto, Producto_Nombre FROM inventario");

    $id=$_GET['ID'];
    $sql2="SELECT * FROM ventas WHERE idVentas ='$id'";
    $query4=mysqli_query($mysqli,$sql2);
    $raw=mysqli_fetch_array($query4);

    //$id=$_GET['ID'];
    //$sql= "SELECT * FROM pedidos WHERE Pedidos_ID='$id'";

    $sql = "SELECT idVentas, empleados.Emple_nombres as nombre_empleado, clientes.Cliente_nombres as nombre_cliente,
            inventario.Producto_Nombre as nombre_producto, Venta_fecha, Venta_cant, Vent_Valor FROM ventas 
            INNER JOIN empleados ON ventas.Emple_ID = empleados.Emple_ID 
            INNER JOIN clientes ON ventas.Cliente_ID = clientes.Cliente_ID
            INNER JOIN inventario ON ventas.idproducto = inventario.idproducto
    WHERE idVentas='$id'";
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <div class="container mt-5">
             <form action="update1.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['idVentas']  ?>">
                        
                     <select name="select_empleado" id="select_empleado" class="form-control mb-3"> 
                     <option value="<?php echo $raw["Emple_ID"]?>"><?php echo $row["nombre_empleado"]?></option>
                           <?php while($datosEmpleado = mysqli_fetch_array($query1)){ ?>
                             <option value="<?php echo $datosEmpleado["Emple_ID"]?>"><?php echo $datosEmpleado["Emple_nombres"]; ?></option>
                           <?php }?>
                        </select>

                    <select name="select_cliente" id="select_cliente" class="form-control mb-3">   
                    <option value="<?php echo $raw["Cliente_ID"]?>"><?php echo $row["nombre_cliente"]?></option>
                        <?php while($datosCliente = mysqli_fetch_array($query2)){?>
                         <option value="<?php echo $datosCliente["Cliente_ID"]?>"><?php echo $datosCliente["Cliente_nombres"]; ?></option> 
                        <?php  }?>
                    </select>
 
                    <select name="select_producto" id="select_producto" class="form-control mb-3">    
                    <option value="<?php echo $raw["idproducto"]?>"><?php echo $row["nombre_producto"]?></option>
                          <?php while($datosProducto = mysqli_fetch_array($query3)){?>
                             <option value="<?php echo $datosProducto["idproducto"]?>"><?php echo $datosProducto["Producto_Nombre"]; ?></option> 
                          <?php  }?>
                     </select>
                  
                    <input type="date" class="form-control mb-3" name="FECHA" placeholder="FECHA" value="<?php echo $row['Venta_fecha']  ?>">
                    <input type="number" class="form-control mb-3" name="cantidad" placeholder="Cantidad venta producto" value="<?php echo $row['Venta_cant']  ?>">
                    <input type="text" class="form-control mb-3" name="PRECIO" placeholder="PRECIO" value="<?php echo $row['Vent_Valor']  ?>">                 

                    <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
             </form>    
         </div>
    </body>
</html>