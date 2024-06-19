<?php
// Iniciar a sessão
session_start();

if (!(isset($_SESSION['user_id']))) {
    header("Location: ../login");
    exit();
}

require_once(__DIR__ . '/../../../config/config.php');
require_once(__DIR__ . '/../../../controllers/ProductController.php');

// Instanciar o controlador de produtos
$controller = new ProductController($pdo);
$products = $controller->index();
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
    
    <img id="banner" src="../../../../assets/banner.webp" alt="">
    <main>
        <h2>Mais vendidos</h2>
        <div id="products">
            <?php foreach ($products as $product) { ?>
                <a href="../productView?id=<?php echo $product['id']; ?>" class="product">
                    <div class="img-container">
                        <img src="<?php echo $product['imagem']; ?>" alt="">
                    </div>
                    <div class="informations-container">
                        <p><?php echo htmlspecialchars($product['nome']); ?></p>
                        <div class="stars-and-price">
                            <div class="stars">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                                    fill="orange" stroke="orange" stroke-width="1" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-star">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                <p>5.0</p>
                            </div>
                            <p class="price">R$ <?php echo number_format($product['preco'], 2, ',', '.'); ?></p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </main>
    <footer>
        BudStrike &copy; 2024
    </footer>

    <script src="./script.js"></script>
</body>

</html>
