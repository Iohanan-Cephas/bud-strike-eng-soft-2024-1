
const logoutButton = document.querySelector('#logout');


console.log("teste" + logoutButton);

document.querySelector('#logout').addEventListener('click', function() {
    // Redirecionar para o arquivo de logout
    window.location.href = 'logout.php';
});