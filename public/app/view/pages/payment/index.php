<?php
    session_start(); // Inicie a sessão se ainda não estiver iniciada

    // Verifique se o usuário está logado e se o user_id está na sessão
    if (!(isset($_SESSION['user_id']))) {
      header("Location: ../login");
      exit();
  }

    $user_id = $_SESSION['user_id']; // Recupere o user_id da sessão

    

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
    <div id="expired-message" class="expired-message">Seu pagamento expirou</div>
    <main id="container" >
        <p>Pagamento expira em <span id="minutes" >30:00<span></p>
        <div id='qr-code'>
            <img src="https://qrcg-free-editor.qr-code-generator.com/main/assets/images/websiteQRCode_noFrame.png" alt="">
        </div>
        <button id="copy">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
          copiar código
        </button>
        
        <p>O pedido será confirmado após a confirmação do pagamento</p>

    </main>
    <footer>
        <!-- BudStrike &copy; 2024 -->
    </footer>
<script src="./script.js"></script>
</body>
</html>
