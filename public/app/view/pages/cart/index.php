<?php
    session_start(); // Inicie a sessão se ainda não estiver iniciada

    // Verifique se o usuário está logado e se o user_id está na sessão
    if (!isset($_SESSION['user_id'])) {
        // Redirecione ou tome outra ação se o usuário não estiver logado
        // Por exemplo, redirecione para a página de login
        header("Location: /login.php");
        exit;
    }

    $user_id = $_SESSION['user_id']; // Recupere o user_id da sessão

    // Agora você pode chamar o controlador passando $user_id como parâmetro
    require_once(__DIR__ . '/../../../controllers/CartController.php');
    $cartController = new CartController($pdo);
    $products = $cartController->index($user_id);

    // Verifique se a requisição para excluir um produto foi feita
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['increase_quantity'])) {
            $product_id = $_POST['increase_quantity'];
            $increaseResult = $cartController->updateQuantity($user_id, $product_id, 1);
            header("Location: ./index.php");
            exit;
        }
    
        if (isset($_POST['decrease_quantity'])) {
            $product_id = $_POST['decrease_quantity'];
            $increaseResult = $cartController->updateQuantity($user_id, $product_id, -1);
            header("Location: ./index.php");
            exit;
        }
    
        if (isset($_POST['delete_product'])) {
            $product_id = $_POST['delete_product'];
            $deleteResult = $cartController->delete($user_id, $product_id);
            header("Location: ./index.php");
            exit;
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
    <main>
        <h2>Meu carrinho</h2>
        <section id="products">
    <?php
        if (empty($products)) {
            echo '<p id="message" >Nenhum produto no carrinho</p>';
        } else {
            foreach ($products as $product) {?>
    <div id="product">
        <div id="img">
            <img src="<?php echo $product['imagem']; ?>" alt="">
        </div>
        <div id="informations" >
            <p id="name"><?php echo $product['nome']; ?></p>
            <p id="price">R$ <?php echo number_format($product['preco'], 2, ',', '.'); ?></p>
            <div id="quantity" >
                <form method="POST">
                    <input type="hidden" name="decrease_quantity" value="<?php echo $product['id']; ?>">
                    <button type="submit" id="minus">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </button>
                </form>
                    <p id="count" ><?php echo $product['quantity']; ?></p>

                <form method="POST">
                    <input type="hidden" name="increase_quantity" value="<?php echo $product['id']; ?>">
                    <button type="submit" id="plus" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                    </button>
                </form>
                
            </div>
        </div>
        <form method="POST">
            <input type="hidden" name="delete_product" value="<?php echo $product['id']; ?>">
            <button id="delete" type="submit" >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </form>
    </div>
    <?php
            }
        }
    ?>
</section>
    </main>
    <footer>
        BudStrike &copy; 2024
    </footer>
<script src="./script.js"></script>
</body>
</html>
