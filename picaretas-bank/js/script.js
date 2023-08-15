document.addEventListener('DOMContentLoaded', function() {
    // Captura todos os elementos 'a' dentro de 'ul' para as opções adicionais
    var linksOpcoes = document.querySelectorAll('ul li a');

    // Adiciona um evento de mouseover para destacar os links quando o mouse passar sobre eles
    linksOpcoes.forEach(function(link) {
        link.addEventListener('mouseover', function() {
            this.style.color = '#ff6600'; // Altera a cor do texto
            this.style.fontWeight = 'bold'; // Torna o texto em negrito
        });

        // Remove o destaque quando o mouse sair do link
        link.addEventListener('mouseout', function() {
            this.style.color = ''; // Remove a cor personalizada
            this.style.fontWeight = ''; // Remove o estilo de negrito
        });
    });
});
