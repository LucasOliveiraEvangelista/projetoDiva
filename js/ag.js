var container = document.getElementById("horas");
var button = document.getElementById("action-btn");

button.addEventListener("click", function(){
    container.classList.toggle("hide");
});