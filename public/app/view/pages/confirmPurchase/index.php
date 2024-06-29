<?php 
session_start(); // Inicie a sessão se ainda não estiver iniciada

// Verifique se o usuário está logado e se o user_id está na sessão
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login");
    exit();
}

$user_id = $_SESSION['user_id']; // Recupere o user_id da sessão

require_once(__DIR__ . '/../../../controllers/CartController.php');
require_once(__DIR__ . '/../../../controllers/ProductController.php');
require_once(__DIR__ . '/../../../controllers/UserController.php');

$productController = new ProductController($pdo);
$cartController = new CartController($pdo);
$userController = new UserController($pdo);

// Obtendo detalhes do produto ou do carrinho
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

// Formatação do total
$formattedTotal = number_format($total, 2, ',', '.');

// Obtendo detalhes do usuário
try {
    $userDetails = $userController->getUserDetails($user_id);

    // Capitalizando nomes
    $firstName = ucfirst(strtolower($userDetails['username']));
    $lastName = ucfirst(strtolower($userDetails['lastName']));
    $fullName = $firstName . ' ' . $lastName;

    // Formatando telefone
    $telefone = $userDetails['telefone'];
    $telefone_formatado = "(" . substr($telefone, 0, 2) . ") " . substr($telefone, 2, 5) . "-" . substr($telefone, 7);

} catch (Exception $e) {
    // Tratamento de erro
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
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
                <p id="name"><?php echo $fullName; ?></p>
                <p id="number"><?php echo $telefone_formatado; ?></p>
                <p id="address"><?php echo $userDetails["address"]; ?></p>
                <p id="city"><?php echo $userDetails["city"] . ', ' . $userDetails["uf"]; ?></p>
            </div>
        </section>

        <section id="summary">
            <h2 id="summary-title">Resumo</h2>
            <div id="summary-details">
                <p class="subtotal">Subtotal: R$ <?php echo $formattedTotal; ?></p>
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
