<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login");
    exit();
}

require_once(__DIR__ . '/../../../controllers/ProductController.php');



$productController = new ProductController($pdo);

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $productDetails = $productController->getProductDetails($productId);

    if (!$productDetails) {
        header("Location: ../error.php");
        exit();
    }
} else {
    header("Location: ../error.php");
    exit();
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
    <?php include_once(__DIR__ . '/total.php'); ?>

    <main>
        <h2>Compre agora</h2>
        <section id="products">
    
    <div id="product">
        <div id="img">
            <img src="<?php echo $productDetails['imagem']; ?>" alt="">
        </div>
        <div id="informations" >
            <p id="name"><?php echo $productDetails['nome']; ?></p>
            <p id="price">R$ <?php echo number_format($productDetails['preco'], 2, ',', '.'); ?></p>
            <div id="quantity" >
                
                    <button type="submit" id="minus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </button>
                
                    <p id="count" >1</p>

                    <button type="submit" id="plus" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </button>
                
            </div>
        </div>
        
    </div>
    
</section>
    </main>
    <footer>
        <!-- BudStrike &copy; 2024 -->
    </footer>
<script src="./script.js"></script>
</body>
</html>

