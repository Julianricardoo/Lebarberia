
<?php 
session_start();
require "../../Controlador/conexion.php";


$query1 = mysqli_query($mysqli, "SELECT Emple_ID, Emple_nombres FROM empleados");
$query2 = mysqli_query($mysqli, "SELECT Cliente_ID, Cliente_nombres FROM clientes");
$query3 = mysqli_query($mysqli, "SELECT idproducto, Producto_Nombre FROM inventario");

if(!isset($_SESSION["id"])){
    header("location:login.php");
    }

    $nombre = $_SESSION["nombre"];
    $id = $_SESSION["id"];

?>

   <?php 
require('../../Controlador/config.php');
$result = $connexion->query('SELECT COUNT(*) as total_products FROM ventas');
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];
?>
  


<!doctype html>
    
<html lang="es"> 
<head>    
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">         
        <title>Modulo_Venta</title>
          <link rel="stylesheet" href="../CSS/estilosNuest_ventas.css">
          <link rel="stylesheet" href="../CSS/styless.css">        
	
</head>


<body> 
  <header>
     <div class="container container__flex">
        <div class="logo">
          <img src="../IMG/LE_Barberia.png" width="100px" class="img_logo"> 
          <div class="fondo_prueba">
          <img src="../IMG/fondo%20madera.jpg" class="img_prueba"></div>      
  
         <nav class="main-nav">
      
             <span class="icon_menu" ><i class="fas fa-bars" id="btnmenuu"></i></span>  
              <ul class="menu" id="menu">            
              <li class="menu_item" id="menu_item"><a href="../index.php" class="menu_link menu_link-select">INICIO</a> </li>
            <?php if($nombre == 'Admin' || $nombre == 'Gerente' ){ ?>
              <li class="menu_item"><a href="Pedido.php" class="menu_link">REGISTRAR PEDIDO</a></li>
              <li class="menu_item"><a href="Mod_Ventas.php" class="menu_link">REGISTRAR VENTA</a></li>
           <?php }?>
           <?php if($nombre == 'Admin'){ ?>
              <li class="menu_item"><a href="usuarios.php" class="menu_link">USUARIOS</a></li>
           <?php }?>
              <li class="menu_item"><a href="clientes.php" class="menu_link">CLIENTES</a></li>
              <li class="menu_item"><a href="empleados.php" class="menu_link">EMPLEADOS</a></li>
              <li class="menu_item"><a href="inventario.php" class="menu_link">INVENTARIO</a></li>
              <li class="menu_item"><a href="proveedores.php" class="menu_link">PROVEEDOR</a>                            
             </ul>          
         </nav> 
      </div> 
    </div>


      
   <!-----------------  login --------------------->
      
    <div class="container container__flex">
       <div class="logueo">    
           <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
               
            <label for="btnlogin" class="textlogin"><?php echo $nombre; ?>
            <input type="checkbox" id="btnlogin" class="btnlogin"></label>   
       </div> 
          <div class="menlogin" id="menlogin">             
             <ul class="lista_user" id="lista_user">
               <li class="userExist"><a href="salir.php" 
                    class="userExistlink">Salir</a></li>
            </ul>        
         </div>
     </div> 
  </header>  
  
  <!---------------------------------img fondo ----------------------------------->
    <section class="fondo">       
         <img src="../IMG/Fondo%20de%20pro.png" width="300px" alt="" class="img_"> 
      </section>
            
 <!-------------------------------------TABLA ----------------------------------->           
    

<!--------------------------PAGINACION TABLA--------------------------------------------->
    <?php
    if ($num_total_rows > 0) {
        $page = false;
 
    //examino la pagina a mostrar y el inicio del registro a mostrar
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    }
 
    if (!$page) {
        $start = 0;
        $page = 1;
    } else {
        $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
    }
    //calculo el total de paginas
    $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);
 
 
    $result = $connexion->query(
       'SELECT idVentas, empleados.Emple_nombres as nombre_empleado, clientes.Cliente_nombres as nombre_cliente, inventario.Producto_Nombre as nombre_producto, Venta_fecha,Venta_cant, Vent_Valor FROM ventas 
            INNER JOIN empleados ON ventas.Emple_ID = empleados.Emple_ID 
            INNER JOIN clientes ON ventas.Cliente_ID = clientes.Cliente_ID
            INNER JOIN inventario ON ventas.idproducto = inventario.idproducto
            ORDER BY idVentas  ASC LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE
    );
    
    ?>
    
   
       
                  <!---------TABLA---------------->
   
                  
                  
    <main class="main">
      <section class="grupo_ventas">      
       <div class="container container__flex">
         <table class = "default_ventas">
          <h3 class="titulo_ventas-lebarberia">LISTA DE VENTAS</h3>
      
     
            <thead>
                <tr>  
                    <th class="vent">N°</th>
                    <th class="vent">EMPLEADO</th>
                    <th class="vent">CLIENTE</th>	
                    <th class="vent">PRODUCTO</th> 
                    <th class="vent">FECHA</th>    
                    <th class="vent">CANTIDAD</th>
                    <th class="vent">PRECIO</th> 
                      <?php if($nombre == 'Admin' ){  ?> 
                    <td class="vent">OPCION</td>
                    <td class="vent">OPCION</td>
                     <?php } ?> 
               </tr>
            </thead>
        
         <?php     
            if(isset($_POST["inputConsulta"])){
            include_once "../../Modelo/consultarVenta.php";}
            
            
            $query = "SELECT idVentas, empleados.Emple_nombres as nombre_empleado, clientes.Cliente_nombres as nombre_cliente,
                           inventario.Producto_Nombre as nombre_producto, Venta_fecha,Venta_cant, Vent_Valor FROM ventas 
            INNER JOIN empleados ON ventas.Emple_ID = empleados.Emple_ID 
            INNER JOIN clientes ON ventas.Cliente_ID = clientes.Cliente_ID
            INNER JOIN inventario ON ventas.idproducto = inventario.idproducto";
        
             if(!isset($_POST["inputConsulta"])){ 
                $sql_query = mysqli_query($mysqli,$query);   
             }
        
        if ($result->num_rows > 0) {   
                while ($row = $result->fetch_assoc()) {  ?>  
        
            
  		              <tbody>
  						   <tr>                                         
                            <td class="fila"><?php echo $row["idVentas"];?></td>
  						    <td class="fila"><?php echo $row["nombre_empleado"];?></td>
  						    <td class="fila"><?php echo $row["nombre_cliente" ];?></td>
  						    <td class="fila"><?php echo $row["nombre_producto"];?></td>  
               	            <td class="fila"><?php echo $row["Venta_fecha"]; ?></td> 
                            <td class="fila"><?php echo $row["Venta_cant"]; ?></td> 
  						    <td class="fila"><?php echo $row["Vent_Valor"];?></td>
                       <?php if($nombre == 'Admin' ){  ?> 
                        <td><a href="../../Modelo/actualizar1.php?ID=<?php echo $row['idVentas'] ?>" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                        
                        <td><a href="../../Modelo/delete1.php?ID=<?php echo $row['idVentas'] ?>" class="btn btn-danger"onclick="return confirmarDelete()"><i class="far fa-trash-alt"></i></a></td>
                     
  						  </tr>
                     <?php } ?> 
  		            </tbody>
  		    
  		
  

          
    <!---------ALERTA ELIMINAR------------>

   <script type="text/javascript">
     function confirmarDelete(){
        var respuesta = confirm("Estas seguro que deseas eliminarlo?");
        if(respuesta == true){
           return true;
        }
        else {
           return false;
        }
     }

</script>        
        <?php   }}?>           
<!--------------------CONTINUACION PAGINACION ------------------------>           
                  
   
    
    <?php
 
    if ($total_pages > 1) {
        echo '<ul class="pagination">';
        if ($page != 1) {
            
            echo '<li class="page-item"><a class="page-link" href="Mod_Ventas.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }
        
        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="Mod_Ventas.php?page='.$i.'">'.$i.'</a></li>';
            }
        }
 
        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="Mod_Ventas.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
        echo '</ul>';
    }
    echo '</nav>';
}
?>
        
           </table>  
           <a href="ReportePDFventas.php" class="pdf"><i class="fas fa-file-pdf"></i></a>            
         </div> 
       </section>  
   







 
<!-------------------------------------------------OPCIONES TABLA------------------------------------------------------->
        
      <div class="lista_opciones">
      
     <!-------------------------------------Agregar -----------------------------------> 
        <?php if($nombre == 'Admin' || $nombre == 'Gerente' ){  ?> 
           <div class="titulo_opciones">
             <button type="submit" id="btn_Agregar">Agregar Venta</button>               
             <ul class="agregarVenta" id="agregarVenta">
               <h1>Agregar venta</h1>
                <form action="../../Modelo/insert_mod_task.php" method="POST">
                      <li class="form-group">
                        <select name="select_empleado" id="">
                          <option value="" selected="" disabled="">Seleccionar empleado</option>
                           <?php while($datosEmpleado = mysqli_fetch_array($query1)){ ?>
                             <option value="<?php echo $datosEmpleado["Emple_ID"]?>"><?php echo $datosEmpleado["Emple_nombres"]; ?></option>
                           <?php }?>
                        </select>
                     </li>

                   <li class="form-group">
                      <select name="select_cliente" id="">
                        <option value="" selected="" disabled="">Seleccionar cliente</option>
                        <?php while($datosCliente = mysqli_fetch_array($query2)){?>
                         <option value="<?php echo $datosCliente["Cliente_ID"]?>"><?php echo $datosCliente["Cliente_nombres"]; ?></option> 
                        <?php  }?>
                      </select>
                    </li>
          
                  <li class="form-group">
                        <select name="select_producto" id="">
                         <option value="" selected="" disabled="">Seleccionar producto</option>
                          <?php while($datosProducto = mysqli_fetch_array($query3)){?>
                             <option value="<?php echo $datosProducto["idproducto"]?>"><?php echo $datosProducto["Producto_Nombre"]; ?></option> 
                          <?php  }?>
                        </select>
                  </li>

                  <li class="form-group">
                    <input type="date" name="FECHA" class="form-control" placeholder="FECHA"autofocus>
                  </li>        

                 <li class="form-group">
                    <input type="number" name="cantidadProducto" class="form-control" placeholder="Cantidad producto venta"autofocus>
                 </li>

                 <li class="form-group">
                    <input type="text" name="PRECIO" class="form-control" placeholder="PRECIO"autofocus>
                 </li>
                 <div class="btnsAgregarVenta">
                    <input type="submit" id="btnAgregarV" class="btnGuardarAgregar" name="insert_mod_task" value="Guardar"> 
                    
                    
                    <button type="submit" class="btnCerrarAgregar" id="btnCerrarAgregar" ><a href="Mod_Ventas.php" class="btnCerrarAgregar1">Cerrar</a></button>
                    
                </div>   
              </form>
            </ul>       
         </div>  
      <?php } ?> 
         
                
 
  <!-------------------------------------Consultar ----------------------------------->              
     <div class="titulo_opciones">
          <button type="button" id="tbn_buscarVenta">Consultar Venta</button>
            
        <div class="tabla_consultar" id="tabla_consultar">              
             <form action="Mod_Ventas.php" method="post"> 
              <div class="form_ventas">
                <h3>Consultar venta</h3>
                 <input type="text" name="inputConsulta" id="inputConsulta" placeholder="Buscar">
                 <div class="btns_buscarCliente">
                   <input type="submit" name="enviarConsul" id="enviarConsul" value="Buscar">
                    <form action="Mod_Ventas.php">
                       <input type="submit" name="" id="btn_volver" value="Volver">
                    </form>
                </div>
             </div>
           </form>
         </div>
       </div> 
     </div>
   </main> 

 <!-------------------------------------footer ----------------------------------->   
  <footer class="footer">
      <div class="container container__flex">
       <div class="column column_33">
           <h3 class="column_title">¿Por qué contactarnos?</h3>
           <p class="column_text">Somos un equipo especializado de barbería, líder en la zona, con gran calidad de servicio. Contáctanos y consulta por cualquiera de nuestros servicios </p>
       </div>
       <div class="column column_33" >
          <h3 class="column_title">  Contáctanos</h3>          
          <p class="column_text"><a href="#"></a><i class="fas fa-map-marker-alt">  Av 56 #12-23</i></p>          
          <p class="column_text"><a href="#" ></a><i class="fas fa-envelope">  lebarberia@hotmail.com</i></p>
          <p class="column_text"><a href="#"></a><i class="fas fa-phone-alt"> Tel: 999-999-999</i></p>
          <p class="column_text"><a href="#"></a><i class="fab fa-whatsapp"> 3223915801</i></p>          
       </div>
       <div class="column column_33">
           <h3 class="column_title">Síguenos en nuestras Redes</h3>
           <p class="column_text"><a href="https://www.facebook.com/groups/1871921056348303"><i class="fab fa-facebook-square"> Facebook</i></a></p>
           <p class="column_text"><a href="https://www.instagram.com/leebarberia/"><i class="fab fa-instagram-square"> Instagram</i></a></p>
       </div>
       <div class="column_100 ">
            <h3 class="copy_1">©copyright </h3>
            <h3 class="copy_2">2021 Le Barberia | todos los derechos reservados</h3>
            <div class="div_logo">
           <img src="../IMG/logo-de-Sena-sin-fondo-Blanco-300x300.png" alt="" class="logo_sena"> 
           </div>
      </div>
      </div>
  </footer>
  <script src="../js/perfil.js"></script>
  <script src="../js/menu.js"></script>
  <script src="../js/ventas/ventanaDesplega_editarVent.js"></script>
  <script src="../js/ventas/agregarVenta.js"></script>
  <script src="../js/ventas/ventanaDesplega_EliminarVent.js"></script>
  <script src="../js/ventas/ventanDesplegabl_ConsultVent.js"></script>
     <script src="https://kit.fontawesome.com/704ac575d3.js" crossorigin="anonymous"></script>



  
</body>

</html>                     

