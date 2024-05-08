<?php

include('../../../config/config.php');






if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_confirm']) && isset($_POST['terms'])) {
        
       
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        
        
        if ($password !== $password_confirm) {
            echo "As senhas não coincidem. Por favor, tente novamente.";
        } else {
            
            $sql = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
            $stmt = $pdo->prepare($sql);

           
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

        
            if ($stmt->execute()) {
                header("Location: ../home");
                exit;
            } else {
                //faço nada
            }
        }
    } else {
        //deixa q o javascript trabaia nessa parte
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        Cadastre-se
    </header>
    <main>
        <div class="login-container">
            <form class="login-form" method="POST" action="">
                <div class="user-container">
                    <img src="../../assets/user.svg" alt="">
                    <input id="user-input" name="username" placeholder="usuário" type="text" required>
                </div>
                <div class="user-password" id="password">
                    <img src="../../assets/lock.svg" alt="">
                    <input type="password" class="password" name="password" id="password-input" placeholder="senha" required>
                </div>
                <div class="user-password" id="password-confirm">
                    <img src="../../assets/lock.svg" alt="">
                    <input type="password" class="password" id="password-input-confirm" name="password_confirm" placeholder="confirmar senha" required>
                </div>
                <div id="terms">
                    <input type="checkbox" name="terms" id="terms" required>
                    <p>concordo com todos os <a href="../terms/index.html">termos</a></p>
                </div>
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
