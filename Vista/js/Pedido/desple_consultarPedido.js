let btn_consultarPedido = document.getElementById("btn_consultarPedido");
let tabla_consultarPedido = document.getElementById("tabla_consultarPedido");


btn_consultarPedido.addEventListener("click", function(){
    tabla_consultarPedido.classList.toggle("mostrar");
});