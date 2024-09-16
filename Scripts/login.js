var formSignin = document.querySelector('#signin');
var formSignup = document.querySelector('#signup');
var formAdmin = document.querySelector('#admin'); // Novo formulário para login administrativo
var btnColor = document.querySelector('.btnColor');

// Adiciona um ouvinte de eventos para o botão de login
document.querySelector('#btnSignin').addEventListener('click', () => {
    formSignin.style.left = "25px";
    formSignup.style.left = "450px";
    formAdmin.style.left = "900px"; // Ajuste conforme necessário
    btnColor.style.left = "0px";
});

// Adiciona um ouvinte de eventos para o botão de cadastro
document.querySelector('#btnSignup').addEventListener('click', () => {
    formSignin.style.left = "-450px";
    formSignup.style.left = "25px";
    formAdmin.style.left = "900px"; // Ajuste conforme necessário
    btnColor.style.left = "110px";
});

// Adiciona um ouvinte de eventos para o botão de login administrativo
document.querySelector('#btnAdmin').addEventListener('click', () => {
    formSignin.style.left = "-900px"; // Ajuste conforme necessário
    formSignup.style.left = "900px"; // Ajuste conforme necessário
    formAdmin.style.left = "25px";
    btnColor.style.left = "220px"; // Ajuste conforme necessário
});