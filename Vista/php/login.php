<?php
require "../../Controlador/conexion.php";
session_start();//inicio de session
if ($_POST){
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    
    $query = "SELECT id, passwordUsuario, nombre, tipo_usuario FROM usuarios WHERE usuario='$usuario'";
    
    $resultado = $mysqli->query($query);
    $num = $resultado->num_rows;
    
    if($num>0){
        $row = $resultado->fetch_assoc();
        $password_bd =$row["passwordUsuario"];    
        
        if($password_bd == $password){
           $_SESSION["id"] = $row["id"];
           $_SESSION["nombre"] = $row["nombre"];
           $_SESSION["tipo_usuario"] = $row["tipo_usuario"];
            
            header("location: empleados.php"); 
        }
        else{
            echo "La contraseña no coincide"; 
        }    
    }
    else{
        echo "NO existe el usuario";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        
        <link rel="stylesheet" href="../CSS/estilosLogin.css">
       
    </head>
    <body class="body">
       <div class="volver">
           <a href="../index.php" class="volver">↶Volver</a>
       </div>
       <div class="container container__flex">
           
        <div class="menulogin" id="menulogin">
           
           
        
          
        <div class="div-login">
          
           <div class="menu_login-titulo">
               <h2 class="titulo_ingreso">Ingreso</h2>
               <h4 class="subtitulo_ingreso">Usuarios registrados</h4>
           </div>
             <div class="input_login">
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="div-usuario">
                       <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" 
                         name="usuario" id="usuario" placeholder="usuario" />
                            
                   </div>
                    <div class="div-password">
                       <label for="inputPassword" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="Password" name="password" placeholder="Contraseña" />
                           
                    </div>                                          
                   <div class="div-forgot_submit">
                       <!--<a class="small" href="password.html" >Forgot Password?</a>-->
                       <button type="submit" class="btn btn-primary">Ingresar</button>
                       
                       <div class="logo">
                      <img src="../IMG/LE_Barberia.png" width="100px" class="img_logo"> 
                </div>
               </div>                    
            </form>
        </div>
        </div>
      </div> 
     </div>
   </body>
</html>



 
 