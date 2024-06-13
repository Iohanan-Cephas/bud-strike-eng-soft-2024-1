
const logoutButton = document.querySelector('#logout');
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



console.log("teste" + logoutButton);

document.querySelector('#logout').addEventListener('click', function() {
    // Redirecionar para o arquivo de logout
    window.location.href = 'logout.php';
});