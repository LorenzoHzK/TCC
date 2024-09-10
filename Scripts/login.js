// Script para gerenciar a transição entre login e criação de conta
var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");

var body = document.querySelector("body");

btnSignin.addEventListener("click", function () {
   body.className = "sign-in-js"; 
});

btnSignup.addEventListener("click", function () {
    body.className = "sign-up-js";
});

// Script para gerenciar o modal de login de administrador
var modal = document.getElementById("loginAdministradorModal");
var btn = document.getElementById("loginAdministradorBtn");
var span = document.getElementsByClassName("fechar")[0];

// Quando o botão de login de administrador for clicado, o modal aparece
btn.onclick = function() {
  modal.style.display = "block";
}

// Quando o usuário clicar no "X", o modal fecha
span.onclick = function() {
  modal.style.display = "none";
}

// Se o usuário clicar fora do modal, ele fecha
window.onclick = function(evento) {
  if (evento.target == modal) {
    modal.style.display = "none";
  }
}