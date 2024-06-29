
const menuButton = document.querySelector('#menuButton');
const closeSide = document.querySelector("#close-side")
const menu = document.querySelector('#menu');


closeSide.addEventListener('click', () => {
    menu.classList.add('menu-closed');
    menu.classList.remove('menu-opened');


})



menuButton.addEventListener('click', () => {
    menu.classList.remove('menu-closed');
    menu.classList.add('menu-opened');
})



const logoutButton = document.querySelector('#logout');

if(logoutButton) {
    logoutButton.addEventListener('click', function() {
        // Redirecionar para o arquivo de logout
        window.location.href = '../../pages/home/logout.php';
    });
}
