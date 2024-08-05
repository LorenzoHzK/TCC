document.addEventListener("DOMContentLoaded", function() {
    const texts = ["Taxas reduzidas", "Investimentos planejados", "Benefícios especiais"];
    let currentIndex = 0;

    function changeText() {
        currentIndex = (currentIndex + 1) % texts.length;
        document.getElementById("alternating-text").textContent = texts[currentIndex];
    }

    setInterval(changeText, 3000); // Altera o texto a cada 2 segundos (2000 milissegundos)
});