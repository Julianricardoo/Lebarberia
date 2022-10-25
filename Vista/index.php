<?php
session_start(); //inicio de session//


if(isset( $_POST["btnlogin"])&& $_POST["btnlogin"]=="btnlogin"){
    header("location:indexPeluqueria.php");
}

?>

   <!doctype html>
    
<html lang="es"> 
<head>    
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">         
        <title>LE BARBERIA</title>
          <link rel="stylesheet" href="../Vista/CSS/estilos.css">
          <link rel="stylesheet" href="../Vista/css/styless.css">
          
           
</head>
<body> 
  <header>
  <div class="container container__flex">
      <div class="logo">
          <img src="IMG/LE_Barberia.png" width="100px" class="img_logo" > 
          <div class="fondo_prueba">
          <img src="IMG/fondo%20madera.jpg" class="img_prueba"></div>      
  
  <nav class="main-nav">
      
          <span class="icon-menu" id="btnmenuu"></span>        
          <ul class="menu" id="menu">  
                       
              <li class="menu_item"><a href="index.php" class="menu_link menu_link-select">INICIO</a></li>
              <li class="menu_item"><a href="php/Productos.php" class="menu_link">PRODUCTOS</a></li>
              
             </ul>          
          </nav> 
        </div> 
      </div>
      
      
     
    <div class="container container__flex">
       <div class="logueo">    
            <a href="php/login.php" class="inicioSesion">Iniciar sesión</a>
        </div> 
      
    </div> 
  </header>  
  
  
   <section class="fondo">       
   <img src="IMG/imagen%20de%20fondo.jpg" width="300px" alt="" class="img_fondo">   
   <div class="texto_fondo"><h1>La mejor barbería de Bogotá</h1>
   </div>
   
   </section>
     
      <div class="div_logo_2">
   <img src="IMG/LE_Barberia.png" alt="" class="logo_2">
   </div>
  
  <main class="main">
    <section class="grupo_bienvenidos">
       <div class="container">
           <h3 class="grupo_title">Bienvenidos a nuestra Barberia</h3>
           <p class="grupo_txt">"Somos la Barbería líder en Bogotá, especializados en cabello, barba, tratamientos, venta de productos de la mejor calidad. Contamos con los mejores servicios."
           </p>
           <p class="grupo_txt2">
           Ven y visitanos.  </p>
       </div>         
    </section>
    
    <section class="grupo_servicios">
      <h3 class="titulo_servicios-lebarberia">Nuestros Servicios</h3>
       <div class="container container__flex">           
           <div class="column column_50-33">
               <img src="IMG/corte%20cabello.jpg" width="150px" alt="" class="servicios_lebarberia">
               <div class="titulo_servicio"><h4>Corte Cabello</h4></div>
               </div>
            <div class="column column_50-33">
                <img src="IMG/corte%20barba.jpg" width="150px" alt="" class="servicios_lebarberia">
                <div class="titulo_servicio"><h4>Barba</h4></div>
            </div>
            <div class="column column_50-33">
                <img src="IMG/planchado.jpg" width="150px" alt="" class="servicios_lebarberia">
                <div class="titulo_servicio"><h4>Planchado</h4></div>
            </div>
            <div class="column column_50-33">
                <img src="IMG/tinturado.jpg" width="150px" alt="" class="servicios_lebarberia">
                <div class="titulo_servicio"><h4>Tinturado</h4></div>
            </div>
            <div class="column column_50-33">
                <img src="IMG/tratamientos.jpg" width="150px" alt="" class="servicios_lebarberia">
                <div class="titulo_servicio"><h4>Tratamientos</h4></div>
            </div> 
            <div class="column column_50-33">
                <img src="IMG/productos.jpg" width="150px" alt="" class="servicios_lebarberia">
                <div class="titulo_servicio"><h4>Venta Productos</h4></div>
            </div>  
            <div> </div>            
       </div>        
    </section>    
  </main>
  
  
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
           <img src="IMG/logo-de-Sena-sin-fondo-Blanco-300x300.png" alt="" class="logo_sena"> 
           </div>
      </div>
      </div>
  </footer>
  <script src="js/menu.js"></script>
  <script src="js/perfil.js"></script>
   <script src="https://kit.fontawesome.com/704ac575d3.js" crossorigin="anonymous"></script>
</body>

</html>                     

                

