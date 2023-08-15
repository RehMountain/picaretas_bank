document.addEventListener('DOMContentLoaded', function() {
    // Captura todos os elementos 'a' dentro de 'ul' para as opções adicionais
    var linksOpcoes = document.querySelectorAll('ul li a');

    // Adiciona um evento de clique para mostrar uma mensagem de confirmação
    linksOpcoes.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Impede o comportamento padrão do link

            var opcao = link.innerHTML.toLowerCase();
            var confirmacao = confirm(`Você está prestes a acessar a opção: ${opcao}. Deseja continuar?`);

            if (confirmacao) {
                window.location.href = link.href; // Redireciona para a página escolhida
            }
        });
    });
});
