<?php

    session_start(); // Inicie a sessão se ainda não estiver iniciada

    // Verifique se o usuário está logado e se o user_id está na sessão
    if (!(isset($_SESSION['user_id']))) {
        header("Location: ../login");
        exit();
    }

    $user_id = (int)$_SESSION['user_id']; // Recupere o user_id da sessão
    $buyNow = $_SESSION['buyNow'];
    $product_id = (int)$_SESSION['product_id'];

    require_once(__DIR__ . '/../../../controllers/PurchaseController.php');
    require_once(__DIR__ . '/../../../controllers/CartController.php');


    $purchaseController = new PurchaseController($pdo);

    if($buyNow){
        $purchaseController->insertOne($user_id, $product_id, 1);
    }else{
        try{
            $purchaseController->insertAllCart($user_id);
        }catch(Exception $e){
    
        }
    
        $cartController = new CartController($pdo);
        
        try{
          $cartController->cleanCart($user_id);
        }catch(Exception $e){
            
        }
    }

    


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
        <button id="button" >Ver meus produtos</button>
    </main>
    <footer>
        <!-- BudStrike &copy; 2024 -->
    </footer>
<script>
    const button = document.querySelector("#button");
    button.addEventListener("click", ()=>{
        window.location = "../myProducts/index.php"
    })
</script>
</body>
</html>
