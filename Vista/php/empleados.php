<?php
session_start();
require "../../Controlador/conexion.php";

   if(!isset($_SESSION["id"])){
    header("location:login.php");
    }

    $nombre = $_SESSION["nombre"];
    $id = $_SESSION["id"]; 


?>
  
  
   <!doctype html>
    
<html lang="es"> 
<head>    
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">         
        <title>EMPLEADOS</title>
          <link rel="stylesheet" href="../CSS/estilosNuest_empleados.css">
          <link rel="stylesheet" href="../CSS/styless.css">
          
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
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
   
<!--------------------------- Tabla empleados ---------------------------------->  
   
  
  <main class="main">
     <section class="grupo_empleados">
     <div class="container container__flex">
       <table class="default_empleados">
        <h3 class="titulo_empleados-lebarberia">EMPLEADOS LE BARBERIA</h3>

 
    <thead>
         <tr>  
           <!-- <td class="tdTitulo">ID</td> -->
           <td class="tdTitulo">Nombre</td>
           <td class="tdTitulo">Telefono</td>
           <td class="tdTitulo">Direccion</td>
           <td class="tdTitulo">eps</td>
           <td class="tdTitulo">Nacimiento</td>
           <?php if($nombre == 'Admin' || $nombre == 'Gerente' ){ ?>
           <td class="tdTitulo">Salario</td>
           <?php } ?> 
           <?php if($nombre == 'Admin' ){  ?> 
                <td class="tdTitulo">Opcion</td>
                <td class="tdTitulo">Opcion</td>
           <?php } ?> 
         </tr>
    </thead>
    
      <?php  
        if(isset($_POST["inputConsul"])){
           include "../../Modelo/consultarEmpleados.php";
           }
           $query = "SELECT * FROM empleados";
           
           if(!isset($_POST["inputConsul"])){ 
             $sql_query = mysqli_query($mysqli,$query); 
           }  
           
                while($row = mysqli_fetch_array($sql_query))  { ?>    
                   <tbody>
                      <tr>
                        
                        <td><?php echo $row["Emple_nombres"];?></td>
                        <td><?php echo $row["Emple_telefono"];?></td>
                        <td><?php echo $row["Emple_direccion"];?></td>
                        <td><?php echo $row["Emple_eps"];?></td>
                        <td><?php echo $row["Emple_fech_nacimiento"];?></td>
                        <?php if($nombre == 'Admin' || $nombre == 'Gerente' ){ ?>
                        <td><?php echo $row["Emple_salario"];?></td>
                        <?php } ?> 
                        <?php if($nombre == 'Admin' ){  ?> 
                        <td><a href="../../Modelo/actualizar4.php?ID=<?php echo $row['Emple_ID'] ?>" class="btn btn-info"><i class="fas fa-edit"></i></a></td>
                        <td><a href="../../Modelo/delete4.php?ID=<?php echo $row['Emple_ID'] ?>" class="btn btn-danger" onclick="return confirmarDelete()"><i class="far fa-trash-alt"></i></a></td> 
                        <?php } ?> 
                          
                        
                        
              <!-- <td> 
                     <form action="empleados.php" method="get">
                        <button type="button">
                         b <a href="empleados.php?id=
                            //??<php echo $row["Emple_ID"]?>">
                            <i class="fas fa-edit"></i></a>
                            </button>

                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Aceptar
                           </button>
                         </form>
                       </td>
                       
                          <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           <i class="fas fa-edit"></i> 
                       </button>-->
                         
                         
                          
                     </tr>
                     </tbody>
                  <?php } ?>
                  
          
          
          
    
         </table> 
            
       </div>        
    </section>    
  </main>
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
  
  <!------------------------- OPCIONES EMPLEADOS -------------------------->
  
  <div class="lista_opciones"> 
         
             
          <?php if($nombre == 'Admin' || $nombre == 'Gerente' ){  ?> 
          
           <div class="titulo_opciones">
              <button type="submit" class="btnAgregar"><a href="lista.php" class="btnAgregar">Agregar Empleado</a></button>
            </div>
            
            
             
              
     <!-------------- consultar empleados  ------------>
           
        <div class="titulo_opciones">
                <button type="submit" class="buscarEmpleado" id="tbn_buscarEmpleado">Buscar Empleado</button> 
                
        <div class="tabla_consultar" id="tabla_consultar"> 
            <form action="empleados.php" method="post"> 
              <div class="form_empleado">
                 <input type="text" name="inputConsul" id="inputConsul" placeholder="Buscar">
                 <div class="btns_buscarEmpleados">
                   <input type="submit" name="enviarConsul" id="enviarConsul" value="Buscar">
                    <form action="empleados.php">
                       <input type="submit" name="" id="btn_volver" value="Reiniciar">
                    </form>
                </div>
             </div>
           </form>
         </div>    <?php } ?> 
         
        <?php  if ($nombre == 'Empleado'){ ?> 
         <div class="titulo_opciones">
                <button type="submit" class="buscarEmpleado" id="tbn_buscarEmpleado">Buscar Empleado</button> 
                
        <div class="tabla_consultarE" id="tabla_consultar"> 
            <form action="empleados.php" method="post"> 
              <div class="form_empleado">
                 <input type="text" name="inputConsul" id="inputConsul" placeholder="Buscar">
                 <div class="btns_buscarEmpleados">
                   <input type="submit" name="enviarConsul" id="enviarConsul" value="Buscar">
                    <form action="empleados.php">
                       <input type="submit" name="" id="btn_volver" value="Reiniciar">
                    </form>
                </div>
             </div>
           </form>
         </div> 
         </div>
         <?php } ?>
        
       
    </div>

    </div>
<!------------------------------- FOOTER ---------------------------------------->

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
  <script src="../js/eliminar.js"></script>
  <script src="../js/menu.js"></script>
  <script src="../js/opcActualizar.js"></script>
  <script src="../js/consultar.js"></script>
  <script src="https://kit.fontawesome.com/704ac575d3.js" crossorigin="anonymous"></script>
  
  
</body>

</html>                     

