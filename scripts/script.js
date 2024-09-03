function esconder() {
    var menu = document.getElementById("menu");
    var user = document.querySelector('.container > div button ');

    if (menu.style.display == 'block') {
        menu.style.display = 'none'
        user.style.display = 'block'
        psq.style.display = 'block'

    }else{
        menu.style.display = 'block'
        // Esconde o Botão User
        if (window.innerWidth <= 673) {
            user.style.display = 'none'
        }
    }
}
