
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>registrar</title>
    <link rel="stylesheet" href="../CSS/estilosTablaEmpleados.css">
</head>
<body>
   <div class="container">
      <div class="div-titulo">
      <h1 class="titulo">Nuevo Registro</h1>
      </div>
      <form action="../../Modelo/registrarLista.php" method="post">        
        
          
          <div class="grupo_form">
             <label for="nombre" class="label">Nombre y apellido</label>         
            <div class="input_form">
              <input type="text" class="input" name="nombre" id="nombre" placeholder="nombre" required>
            </div>
          </div>
          
          <div class="grupo_form">
             <label for="telefono" class="label">Telefono</label>         
            <div class="input_form">
              <input type="text" class="input" name="telefono" id="telefono" placeholder="telefono" min="8" max="10" required>
            </div>
          </div>
          
          <div class="grupo_form">
             <label for="direccion" class="label">Direccion</label>         
            <div class="input_form">
              <input type="text" class="input" name="direccion" id="direccion" placeholder="direccion">
            </div>
          </div>
          
          <div class="grupo_form">
             <label for="eps" class="label">eps</label>         
            <div class="input_form">
              <input type="text" class="input" name="eps" id="eps" placeholder="eps">
            </div>
          </div>
          
          <div class="grupo_form">
             <label for="fecha_nacimiento" class="label">fecha nacimiento</label>         
            <div class="input_form">
              <input type="date" class="input" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="fecha">
            </div>
          </div>
          
           <div class="grupo_form">
             <label for="salario" class="label">salario</label>         
            <div class="input_form">
              <input type="number" class="input" name="salario" id="salario" placeholder="salario">
            </div>
          </div>
          
          <div class="btns">
              <button type="submit" name="" id=""><a href="empleados.php">Regresar</a></button>              
              <button type="submit" name="btn_guardar" id="btn_guardar">Guardar</button>
          </div>
          
      </form>
      
       
   </div>
   
  
</body>
</html>