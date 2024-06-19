<?php 
    session_start(); // Inicie a sessão se ainda não estiver iniciada

    // Verifique se o usuário está logado e se o user_id está na sessão
    if (!(isset($_SESSION['user_id']))) {
      header("Location: ../login");
      exit();
  }

    $user_id = $_SESSION['user_id']; // Recupere o user_id da sessão
    require_once(__DIR__ . '/../../../controllers/CartController.php');
    require_once(__DIR__ . '/../../../controllers/productController.php');

    $productController = new ProductController($pdo);
    $cartController = new CartController($pdo);

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $product_id = $_GET['id'];

        $productDetails = $productController->getProductDetails($product_id);
        $total = $productDetails["preco"];
        $_SESSION['buyNow'] = true;
        $_SESSION['product_id'] = $product_id;


    } else {
        $total = $cartController->getCartTotalValue($user_id);

        if ($total == 0) {
            header("Location: ../home");
            exit();
        }
        $_SESSION['buyNow'] = false;

    }
    
    $formattedTotal = number_format($total, 2, ',', '.');
    
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

    <main>
        <section id="address">
            <h2 id="address-title">Endereço</h2>
            <div id="address-informations">
                <p id="name">Micael Ribeiro dos Santos</p>
                <p id="number">+55 63 99242-9173</p>
                <p id="address">Universidade Federal do Tocantins, Bloco 3 - Sala 109</p>
                <p id="city">Palmas, Tocantins, Brazil - 77020-021</p>
            </div>
        </section>

        <section id="summary">
            <h2 id="summary-title">Resumo</h2>
            <div id="summary-details">
                <p class="subtotal" >Subtotal: R$ <?php echo($formattedTotal)?></p>
                <p>Frete: R$ 00,00</p>
            </div>
        </section>

        <section id="payment">
            <p>Método de pagamento</p>
            <p id="msg">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                No momento só aceitamos pagamentos via pix
            </p>
        </section>

        <div id="confirm">
            <button id="confirm-button">
                Confirmar compra
            </button>
        </div>
    </main>

    <script src="./script.js"></script>
    <script>
        document.getElementById('confirm-button').addEventListener('click', function() {
            window.location.href = '../payment/index.php';
        });
    </script>
</body>
</html>
