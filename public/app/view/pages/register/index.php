<?php
require_once '../../../config/config.php';
require_once(__DIR__ . '/../../../controllers/UserController.php');
session_start();

// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Cria uma instância do UserController, passando o objeto PDO
    $controller = new UserController($pdo);
    
    // Chama o método handleRegister() no UserController para processar o registro
    $controller->handleRegister($_POST);
}

// Verifica se o usuário já está logado, redireciona para a página inicial
if (isset($_SESSION['user_id'])) {
    header("Location: ../home");
    exit(); // Termina o script após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudStrike - Cadastro</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        Cadastre-se
    </header>
    <main>
        <div class="login-container">
            <form class="login-form" method="POST">
                <div class="input" id="username">
                    <input id="username-input" name="username" placeholder="Nome de usuário" type="text" required>
                </div>
                <div class="input" id="lastName">
                    <input id="lastName-input" name="lastName" placeholder="Sobrenome" type="text" required>
                </div>
                <div class="input" id="email">
                    <input id="email-input" name="email" placeholder="Email" type="email" required>
                </div>
                <div class="input" id="address">
                    <input id="address-input" name="address" placeholder="Endereço" type="text" required>
                </div>
                <div class="input" id="telefone">
                    <input id="telefone-input" name="telefone" placeholder="Telefone" type="tel" required>
                </div>
                <div class="city-and-state">
                    <div class="input" id="city">
                        <input id="city-input" name="city" placeholder="Cidade" type="text" required>
                    </div>
                    <div class="input" id="uf">
                        <input id="uf-input" name="uf" placeholder="Estado" type="text" required>
                    </div>
                </div>
                <div class="input" id="password">
                    <input id="password-input" name="password" placeholder="Senha" type="password" required>
                </div>
                <div class="input" id="password-confirm">
                    <input id="password-confirm-input" name="password_confirm" placeholder="Confirmar senha" type="password" required>
                </div>
                <div id="terms">
                    <input type="checkbox" name="terms" id="terms-checkbox" required>
                    <label for="terms-checkbox">Concordo com todos os <a href="../terms/index.php">termos</a></label>
                </div>
                <p class="login">Já tem uma conta? <a href="../login">Faça login</a></p>
                <div class="login-button">
                    <button type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        BudStrike &copy; 2024
    </footer>
</body>
</html>
