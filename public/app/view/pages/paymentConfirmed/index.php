<?php
    session_start(); // Inicie a sessão se ainda não estiver iniciada

    // Verifique se o usuário está logado e se o user_id está na sessão
    if (!(isset($_SESSION['user_id']))) {
        header("Location: ../login");
        exit();
    }

    $user_id = $_SESSION['user_id']; // Recupere o user_id da sessão
    
    require_once(__DIR__ . '/../../../controllers/CartController.php');
    $cartController = new CartController($pdo);
    $total = $cartController->index($user_id);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
    <title>BudStrike</title>
</head>
<body>
    <?php include_once(__DIR__ . '../../../templates/header/index.php'); ?>

    <?php include_once(__DIR__ . '../../../templates/menu/index.php'); ?>
    <main id="container" >
        <img src="../../../../assets/verified.png" alt="">
        <p>Seu pagamento foi confirmado, obrigado.</p>
        <button>Ver meus produtos</button>

    </main>
    <footer>
        <!-- BudStrike &copy; 2024 -->
    </footer>
<script src="./script.js"></script>
</body>
</html>
