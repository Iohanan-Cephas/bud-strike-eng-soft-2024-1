<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once(__DIR__ . '/../../../controllers/CartController.php');
    require_once(__DIR__ . '/../../../controllers/ProductController.php');

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else {
        $user_id = false;
    }


    // Verifique se o usuário está logado e se o user_id está na sessão
    if ((isset($_SESSION['user_id']))) {

        // Agora você pode chamar o controlador passando $user_id como parâmetro
        $cartController = new CartController($pdo);
        $products = $cartController->index($user_id);
        
        
    }else {

        $productController = new ProductController($pdo);
        
        if (isset($_SESSION['products']) && is_array($_SESSION['products'])) {
            foreach ($_SESSION['products'] as $item) {
                $product_id = $item['product_id'];
                $quantity = $item['quantity'];
        
                // Obtém os detalhes do produto usando o ProductController
                $product_details = $productController->getProductDetails($product_id);
        
                // Adiciona a quantidade ao array de detalhes do produto
                $product_details['quantity'] = $quantity;
        
                // Adiciona o produto com detalhes e quantidade ao array $products
                $products[] = $product_details;
            }
        }

        
                    
    }

    // Verifique se a requisição para excluir um produto foi feita
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['increase_quantity'])) {
            if($user_id) {
                $product_id = $_POST['increase_quantity'];
                $increaseResult = $cartController->updateQuantity($user_id, $product_id, 1);
                
            }else {
                        
                if (isset($_POST['increase_quantity'])) {
                    $product_id = $_POST['increase_quantity'];

                    
                    if (isset($_SESSION['products']) && is_array($_SESSION['products'])) {
                        
                        foreach ($_SESSION['products'] as $key => $item) {
                            if ($item['product_id'] == $product_id) {
                                
                                $_SESSION['products'][$key]['quantity'] += 1;
                                break; 
                            }
                        }
                    }
                }
            }

            header("Location: ./index.php");
            include_once(__DIR__ . '/total.php');
            exit;
        }
    
        if (isset($_POST['decrease_quantity'])) {

            if($user_id) {
                $product_id = $_POST['decrease_quantity'];
                $increaseResult = $cartController->updateQuantity($user_id, $product_id, -1);
                
            }else {
                $product_id = $_POST['decrease_quantity'];
                $increaseResult = $cartController->updateQuantity($user_id, $product_id, -1);
                
            }
            header("Location: ./index.php");
            include_once(__DIR__ . '/total.php');
            exit;
        }
    
        if (isset($_POST['delete_product'])) {

            if($user_id){
                $product_id = $_POST['delete_product'];
                $deleteResult = $cartController->delete($user_id, $product_id);
                header("Location: ./index.php");
                include_once(__DIR__ . '/total.php');
                exit;
            }{
                $product_id = $_POST['delete_product'];
                if (isset($_SESSION['products']) && is_array($_SESSION['products'])) {
                    $_SESSION['products'] = array_filter($_SESSION['products'], function ($item) use ($product_id) {
                        return $item['product_id'] != $product_id;
                    });
                }
                header("Location: ./index.php");
                include_once(__DIR__ . '/total.php');
                exit;
            }

            
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
    <?php include_once(__DIR__ . '/total.php'); ?>

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
        <!-- BudStrike &copy; 2024 -->
    </footer>
<script src="./script.js"></script>
</body>
</html>
