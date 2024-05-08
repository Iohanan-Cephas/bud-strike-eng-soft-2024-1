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
            <form class="login-form" action="">
                <div class="user-container">
                    <img src="../../assets/user.svg" alt="">
                    <input id="user-input" placeholder="usuário" type="text">
                </div>
                <div id="passwordContainer" class="user-password">
                    <img src="../../assets/lock.svg" alt="">
                    <input type="password" id="password-input" placeholder="senha">
                </div>
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

    <script src="./script.js"></script>
</body>
</html>