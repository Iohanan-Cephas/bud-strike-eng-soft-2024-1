<?php
session_start(); // Inicie a sessão se ainda não estiver iniciada

// Verifique se o usuário está logado e se o user_id está na sessão
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login");
    exit();
}

$user_id = $_SESSION['user_id']; // Recupere o user_id da sessão

require_once(__DIR__ . '/../../../controllers/PurchaseController.php');
require_once(__DIR__ . '/../../../controllers/ProductController.php');

// Supondo que você tenha o $pdo configurado anteriormente
$purchaseController = new PurchaseController($pdo);
$productController = new ProductController($pdo);

// Busca todas as compras do usuário
$purchases = $purchaseController->index($user_id);
$purchases = array_reverse($purchases);
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
    <title>BudStrike - Meus produtos</title>
</head>
<body>
    <?php include_once(__DIR__ . '../../../templates/header/index.php'); ?>
    <?php include_once(__DIR__ . '../../../templates/menu/index.php'); ?>

    <main>
        <h2>Meus produtos</h2>
        <section id="products">
            <?php foreach ($purchases as $purchase): ?>
                <?php
                // Obtém os detalhes do produto para esta compra
                $productDetails = $productController->getProductDetails($purchase['product_id']);
                ?>
                <div class="product">
                    <div class="img">
                        <img src="<?php echo $productDetails['imagem']; ?>" alt="">
                    </div>
                    <div class="informations">
                        <div class="price-and-name">
                            <p class="name"><?php echo $productDetails['nome']; ?></p>
                            <p class="price">R$ <?php echo number_format($productDetails['preco'], 2); ?></p>
                        </div>
                        <div class="details">
                            <p>Comprado em: <?php echo date('d/m/Y', strtotime($purchase['purchase_date'])); ?></p>
                            <p><?php echo $purchase['quantity']; ?> Unidade(s)</p>
                        </div>
                        
                        <a href="../buyNow?id=<?php echo $productDetails['id']; ?>" class="buy-now-link"><button>Comprar Novamente</button></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <footer>
        BudStrike &copy; 2024
    </footer>

    <script src="./script.js"></script>
</body>
</html>
