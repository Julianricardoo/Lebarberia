let btn_buscarCliente = document.getElementById("btn_buscarCliente");
let tabla_consultar = document.getElementById("tabla_consultar");
let tabla_consultarE = document.getElementById("tabla_consultarE");

btn_buscarCliente.addEventListener("click", function(){
    tabla_consultar.classList.toggle("mostrar2");
    tabla_consultarE.classList.toggle("mostrar2");
});