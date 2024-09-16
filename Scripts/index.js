// Seleciona os elementos do dropdown
const userDropdown = document.querySelector('.user-dropdown');
const dropdownContent = document.querySelector('.dropdown-content');

// Variável para controlar o tempo de atraso
let timeoutId;

// Quando o mouse estiver sobre o ícone de usuário
userDropdown.addEventListener('mouseenter', () => {
    // Cancela qualquer tentativa de esconder o dropdown
    clearTimeout(timeoutId);
    // Exibe o dropdown
    dropdownContent.style.display = 'block';
});

// Quando o mouse sair do dropdown
userDropdown.addEventListener('mouseleave', () => {
    // Define um tempo de atraso (500ms) antes de esconder o dropdown
    timeoutId = setTimeout(() => {
        dropdownContent.style.display = 'none';
    }, 500); // 500ms = 0.5 segundo de atraso
});
