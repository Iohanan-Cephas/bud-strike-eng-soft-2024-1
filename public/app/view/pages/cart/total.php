<?php
  require_once(__DIR__ . '/../../../controllers/CartController.php');
  require_once(__DIR__ . '/../../../controllers/ProductController.php');

  $cartController = new CartController($pdo);
  $productController = new ProductController($pdo);
  $total = 0;



  if($user_id) {
    $total = $cartController->getCartTotalValue($user_id);
  }else {
    // Verifica se há produtos na sessão
    if (isset($_SESSION['products']) && is_array($_SESSION['products'])) {
      foreach ($_SESSION['products'] as $item) {
          $product_id = $item['product_id'];
          $quantity = $item['quantity'];

          // Obtém os detalhes do produto usando o ProductController
          $product_details = $productController->getProductDetails($product_id);

          // Calcula o subtotal do produto (preço * quantidade)
          $subtotal = $product_details['preco'] * $quantity;

          // Adiciona o subtotal ao total
          $total += $subtotal;
      }
    }
  }





  $formattedTotal = number_format($total, 2, ',', '.');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Document</title>
</head>
<body>
  <?php if ($total > 0): ?>
    <section class="total">
      <div id="details">
        <p id="total-price">Total: R$ <?php echo $formattedTotal ?></p>
        <div id="subtotal-and-shipping">
          <p>Subtotal: R$ R$ <?php echo $formattedTotal ?></p>
          <p>Frete: R$ 00,00</p>
        </div>
      </div>
      <div id="total-container">
        <div id="price-and-see-more">
          <div id="price">
            R$ <?php echo $formattedTotal ?>
          </div>
          <button id="see-more">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
          </button>
        </div>
        <button id="continue">
          Continuar
        </button>
      </div>
    </section>
  <?php endif; ?>
  <script src="./script.js"></script>
  
</body>
</html>
