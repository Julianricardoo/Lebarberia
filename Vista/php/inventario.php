<?php
session_start();
require "../../Controlador/conexion.php";

 if(!isset($_SESSION["id"])){
    header("location:login.php");
}



$nombre = $_SESSION["nombre"];
$id = $_SESSION["id"]; 

?>
  
  
   <?php 
require('../../Controlador/config.php');
$result = $connexion->query('SELECT COUNT(*) as total_products FROM inventario');
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];
?>
  
   
 
<!doctype html>
    
<html lang="es"> 
<head>    
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">         
        <title>Inventario</title>
          <link rel="stylesheet" href="../CSS/estilosNuest_inventario.css">
          <link rel="stylesheet" href="../css/styless.css">
          
           
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
          <li class="menu_item"><a href="../index.php" class="menu_link menu_link-select">INICIO</a> </li>
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
  
  
   <section class="fondo">       
   <img src="../IMG/Fondo%20de%20pro.png" width="300px" alt="" class="img_">   
  
   </section>
  
  
  
  
 
  
  
 
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
       'SELECT * FROM inventario         
        ORDER BY idproducto ASC LIMIT '.$start.', '.NUM_ITEMS_BY_PAGE
    );
    
    ?>
    
   
       
                  <!---------TABLA---------------->
    <main class="main"> 
    <section class="grupo_inventario"> 
     <div class="container container__flex"> 
         <table class="default_inventario">
            <h3 class="titulo_inventario-lebarberia">INVENTARIO ACTUAL</h3> 
     
              <tr lista_clientes>  	
                <td class="tdTitulo">N°</td> 
                <td class="tdTitulo">NOMBRE PRODUCTO</td>
                <td class="tdTitulo">TIPO</td>
                <td class="tdTitulo">CANTIDAD ACTUAL</td>
                <td class="tdTitulo">PRECIO</td>
                <td class="tdTitulo">FECHA ENTRADA</td>
                <?php if($nombre == 'Admin' ){  ?> 
                <td class="tdTitulo">OPCION</td>
                <td class="tdTitulo">OPCION</td>
                <?php } ?> 
              </tr>
              
             <?php    
             if(isset($_POST["inputConsulta"])){
             include "../../Modelo/consultarProducto.php";
             }

                
             $query ="SELECT * FROM inventario";
             if(!isset($_POST["inputConsulta"])){ 
                $sql_query = mysqli_query($mysqli,$query);   
             }
        
        
               if ($result->num_rows > 0) {   
                while ($row = $result->fetch_assoc()) {  ?> 
                    
                  <tbody>
                      <tr>
                        <td><?php echo $row["idproducto"];?></td>  
                        <td><?php echo $row["Producto_Nombre"];?></td>
                        <td><?php echo $row["Producto_tipo"];?></td>    
                        <td><?php echo $row["Producto_cantidad_actual"];?></td>
                        <td><?php echo $row["Producto_precio"];?></td> 
                        <td><?php echo $row["Producto_fecha_entrada"];?></td>
                        <?php if($nombre == 'Admin' ){  ?> 
                          <td><a href="../../Modelo/actualizar3.php?ID=<?php echo $row['idproducto'] ?>" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                          
                        <td><a href="../../Modelo/delete3.php?ID=<?php echo $row['idproducto'] ?>" class="btn btn-danger" onclick="return confirmarDelete()"><i class="far fa-trash-alt"></i></a></td>
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
            
            echo '<li class="page-item"><a class="page-link" href="inventario.php?page='.($page-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }
        
        for ($i=1;$i<=$total_pages;$i++) {
            if ($page == $i) {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="inventario.php?page='.$i.'">'.$i.'</a></li>';
            }
        }
 
        if ($page != $total_pages) {
            echo '<li class="page-item"><a class="page-link" href="inventario.php?page='.($page+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
         
        echo '</ul>';
    }
    echo '</nav>';
    
}
?>
        
           </table> 
           <a href="ReportePDFinventario.php" class="pdf"><i class="fas fa-file-pdf"></i></a>            
         </div> 
       </section>  
    </main>
    <!---------------------------- OPCIONES CLIENTES ----------------------------------->

   
    <div class="lista_opciones">
                                
          <!------------------ Agregar Cliente  ----------------->
        <?php if($nombre == 'Admin' || $nombre == 'Gerente' ){  ?> 
          
        <div class="titulo_opciones">
          <button type="button" id="btn_Agregar" >Agregar Producto</button>
             <ul class="agregarInventario" id="agregarCliente">
                <h1>Agregar Producto</h1>
             
              <form action="../../Modelo/opcionesphpInventario.php" method="POST">  
                      <li class="form-group">
                          <input type="text" name="nombreAct" id="nombreAct" placeholder="Nombre producto" required></li>
                      <li class="form-group">
                          <input type="text" name="tipoAct" id="tipoAct" placeholder="Tipo" required>
                      </li>
                      <!-- <li class="form-group">
                          <input type="number" name="cantIngreAct" id="cantIngreAct" placeholder="Cantidad ingreso">
                      </li> -->
                      <li class="form-group">
                          <input type="number" name="cantActualAct" id="cantActualAct" placeholder="Cantidad actual" required>
                      </li> 
                      <li class="form-group">
                          <input type="text" name="productoPrecio" id="productoPrecio" placeholder="Precio" required>
                      </li>
                      <li class="form-group">
                          <input type="date" name="fechaEntraAct" id="fechaEntraAct" placeholder="Fecha entrada" required>
                      </li>
                      <div class="btnsAgregarProveedor">
                          <input type="submit" id="btnAgregarV" class="btnGuardarAgregar" name="insert_mod_task" value="Guardar">
                     </div>
            </form>
         </ul>
      </div>  
           
                
                    
          <!----------------- consultar Cliente  -------------------->

        <div class="titulo_opciones">
          <button type="button" id="btn_buscarCliente">Consultar Producto</button>
            
            <div class="tabla_consultar" id="tabla_consultar">              
             <form action="inventario.php" method="post"> 
              <div class="form_cliente">
                <h3>Consultar Producto</h3>
                 <input type="text" name="inputConsulta" id="inputConsulta" placeholder="Buscar">
                 <div class="btns_buscarCliente">
                   <input type="submit" name="enviarConsul" id="enviarConsul" value="Buscar">
                    <form action="inventario.php">
                       <input type="submit" name="" id="btn_volver" value="Reiniciar">
                    </form>
                </div>
             </div>
           </form>
         </div><?php } ?> 
           
           <?php  if ($nombre == 'Empleado'){ ?> 
            <div class="titulo_opciones">
          <button type="button" id="btn_buscarCliente">Consultar Producto</button>
            
           <div class="tabla_consultarE" id="tabla_consultar">              
             <form action="inventario.php" method="post"> 
              <div class="form_cliente">
                <h3>Consultar Producto</h3>
                 <input type="text" name="inputConsulta" id="inputConsulta" placeholder="Buscar">
                 <div class="btns_buscarCliente">
                   <input type="submit" name="enviarConsul" id="enviarConsul" value="Buscar">
                    <form action="inventario.php">
                       <input type="submit" name="" id="btn_volver" value="Reiniciar">
                    </form>
                </div>
             </div>
           </form>
         </div>
           <?php } ?> 
            </div>
      </div>  
    

    <!------------------------------------ FOOTER -------------------------------------->

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
  <script src="../js/ventanaDesplegable_agregarCliente.js"></script>
  <script src="../js/ventanaDesplegable_eliminarCliente.js"></script>
  <script src="../js/ventanaDesplegable_consultarCliente.js"></script>
  <script src="../js/ventanaDesplegable_actualizarCliente.js"></script> 
        <script src="https://kit.fontawesome.com/704ac575d3.js" crossorigin="anonymous"></script>  
        
    </body>
</html>                     

                  

