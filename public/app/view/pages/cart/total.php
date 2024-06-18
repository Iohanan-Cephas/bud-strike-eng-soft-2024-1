<?php

  require_once(__DIR__ . '/../../../controllers/CartController.php');
  $cartController = new CartController($pdo);
  $total = $cartController->getCartTotalValue($user_id, $product_id);
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
  <section class="total" >
    <div id="details"  >
      <p id="total-price" >Total: R$ 469,98</p>
      <div id="subtotal-and-shipping">
        <p>Subtotal: R$ 469,98</p>
        <p>Frete: R$ 00,00</p>
      </div>
    </div>
    <div id="total-container">
      <div id="price-and-see-more" >
        <div id="price">
          R$ <?php echo($formattedTotal) ?>
        </div>
        <button id="see-more" >
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>

        </button>
      
      </div>
      <button id="continue">
        Continuar
      </button>
    </div>
  </section>
  <script src="./script.js"></script>
</body>
</html>