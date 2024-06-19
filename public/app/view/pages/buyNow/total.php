<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login");
    exit();
}

require_once(__DIR__ . '/../../../controllers/ProductController.php');


$productController = new ProductController($pdo);


if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    $productDetails = $productController->getProductDetails($productId);
    $formattedTotal = number_format($productDetails["preco"], 2, ',', '.');
} else {
  //erro    
}
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
  
  <script src="./script.js"></script>
  <script>
    const productId = <?php echo json_encode($productId); ?>;

    document.getElementById('continue').addEventListener('click', function() {
      // Usa productId para redirecionar para a página de confirmação com o ID do produto
      window.location.href = `../confirmPurchase/index.php?id=${productId}`;
    });
  </script>
</body>
</html>
