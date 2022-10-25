let tbn_buscarEmpleado = document.getElementById("tbn_buscarEmpleado");
let tabla_consultar = document.getElementById("tabla_consultar");
let tabla_consultarE = document.getElementById("tabla_consultarE");



tbn_buscarEmpleado.addEventListener("click", function(){
    tabla_consultar.classList.toggle("mostrar");
    tabla_consultarE.classList.toggle("mostrar");
});