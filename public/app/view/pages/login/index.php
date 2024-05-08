<?php
session_start(); // Inicia a sessão

include('../../../config/config.php');


if (isset($_SESSION['user_id'])) {
    // Se uma sessão estiver ativa, redireciona para a página inicial
    header("Location: ../home");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para buscar usuário pelo nome de usuário e senha
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Login bem-sucedido, cria uma sessão para o usuário
        $_SESSION['user_id'] = $user['id']; // Supondo que 'id' é o campo de identificação do usuário
        $_SESSION['username'] = $user['username'];

        // Redireciona para a página inicial após o login
        header("Location: ../home");
        exit();
    } else {
        // Login falhou, exibe uma mensagem de erro
        $login_error = "Nome de usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudStrike</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        Login
    </header>
    <main>
        <div class="login-container">
            <form class="login-form" method="POST" action="">
                <div class="user-container">
                    <img src="../../assets/user.svg" alt="">
                    <input name="username" id="user-input" placeholder="usuário" type="text" required>
                </div>
                <div id="passwordContainer" class="user-password">
                    <img src="../../assets/lock.svg" alt="">
                    <input name="password" type="password" id="password-input" placeholder="senha" required>
                </div>
                <?php if (isset($login_error)) { ?>
                    <p style="color: red;"><?php echo $login_error; ?></p>
                <?php } ?>
                <p id="register-msg">Não tem uma conta? <a href="../register/">Cadastre-se</a></p>

                <div class="login-button">
                    <button type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </main>
    <footer>
        BudStrike &copy; 2024
    </footer>
</body>
</html>
