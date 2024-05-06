// Função para alternar a visibilidade do menu dropdown
function toggleMenu() {
    var menu = document.getElementById('navbar-default');
    menu.classList.toggle('hidden');
}

// Adiciona um event listener ao botão do menu
document.addEventListener('DOMContentLoaded', function () {
    var menuButton = document.querySelector('[data-collapse-toggle="navbar-default"]');
    if (menuButton) {
        menuButton.addEventListener('click', function () {
            toggleMenu();
        });
    }
});
