<?php
session_start();

// if (!isset($_SESSION['user_id'])) {
//     header("Location: ../login");
//     exit();
// }

require_once(__DIR__ . '/../../../config/config.php');
require_once(__DIR__ . '/../../../controllers/ProductController.php');
require_once(__DIR__ . '/../../../controllers/CartController.php');

try {
    $productController = new ProductController($pdo);

    $productId = $_GET['id'] ?? null;

    $productDetails = $productController->getProductDetails($productId);
} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
    exit;
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
    exit;
}

// Verifica se o formulário de "Adicionar ao carrinho" foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {

    if(isset($_SESSION['user_id'])) {
        try {
            $user_id = $_SESSION['user_id'];
            $product_id = $_POST['product_id'];
            $quantity = 1;
    
            $cartController = new CartController($pdo);
    
            // Insere o produto no carrinho
            $success = $cartController->insert($user_id, $product_id, $quantity);
    
            if ($success) {
                // Redireciona para a mesma página com o ID do produto
                header("Location: {$_SERVER['PHP_SELF']}?id=$product_id");
                exit();
            } else {
                // Trate caso não seja bem sucedido
            }
        } catch (PDOException $e) {
            // Em caso de erro na conexão PDO
            echo 'Erro de conexão: ' . $e->getMessage();
            exit;
        } catch (Exception $e) {
            // Em caso de outras exceções
            echo 'Erro: ' . $e->getMessage();
            exit;
        }
    } else {
        $product_id = $_POST['product_id'];

        // Verifique se a variável de sessão existe antes de adicioná-la
        if (!isset($_SESSION['products'])) {
            $_SESSION['products'] = [];
        }

        // Verifica se o produto já está na sessão
        $product_exists = false;
        foreach ($_SESSION['products'] as &$item) {
            if ($item['product_id'] == $product_id) {
                // Se o produto já existir na sessão, aumente a quantidade
                $item['quantity']++;
                $product_exists = true;
                break;
            }
        }

        // Se o produto não existir na sessão, adicione-o com quantidade 1
        if (!$product_exists) {
            $quantity = 1;
            $_SESSION['products'][] = ['product_id' => $product_id, 'quantity' => $quantity];
        }

        // Redirecione de volta para a página atual com o ID do produto
        header("Location: {$_SERVER['PHP_SELF']}?id=$product_id");
        exit;
    }

    
}

// Verifica se o formulário de "Comprar agora" foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_now'])) {
  try {
    // Recupere o ID do produto que foi enviado através do formulário (supondo que você tenha uma maneira de definir $product_id)
    $product_id = $_POST['product_id'] ?? null;

    if (!$product_id) {
        throw new Exception('ID do produto não fornecido.');
    }

    // Redireciona para a página buyNow com o ID do produto
    header("Location: ../buyNow?id=" . $product_id);
    exit();
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
    // Trate o erro de forma adequada aqui, como exibir uma mensagem de erro ou redirecionar para uma página de erro
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
        <div id="product-image">
            <img src="<?php echo $productDetails['imagem']; ?>" alt="Imagem do Produto">
        </div>
        <div id="price-and-stars">
            <p id="price">R$ <?php echo number_format($productDetails['preco'], 2, ',', '.'); ?></p>
            
            <div id="stars">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="orange" stroke="orange" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                <p>5.0</p>
            </div>
        </div>
        <p id="name"><?php echo $productDetails['nome']; ?></p>
        <p id="description"><?php echo $productDetails['descricao']; ?></p>
        <div id="free-shipping">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
            <p>Frete grátis</p>
        </div>
        <section id="button-section">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
                <button type="submit" id="buy-now" name="buy_now">Comprar agora</button>
            </form>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
                <button type="submit" id="add-to-cart" name="add_to_cart">Adicionar ao carrinho</button>
            </form>
            
        </section>
    </main>
    <footer>
        BudStrike &copy; 2024
    </footer>
    <script src="./script.js"></script>
</body>
</html>
