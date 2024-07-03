<?php 

session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login");
    exit();
}

require_once(__DIR__ . '/../../../../controllers/PurchaseController.php');
$purchaseController = new PurchaseController($pdo);

$purchaseDetails = $purchaseController->indexAll();



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>BudStrike</title>
</head>
<body>
  

  <main>
    <h1>Pedidos</h1>
    <div class="purchases">
      <?php foreach ($purchaseDetails as $purchase): ?>
        <div class="purchase">
          <div class="first">
            <p class="name"><?= htmlspecialchars($purchase['user_name']); ?></p>
            <p class="product-name"><?= htmlspecialchars($purchase['product_name']); ?></p>
            <p class="price">R$ <?= number_format($purchase['price_paid'], 2, ',', '.'); ?></p>
          </div>
          <div class="quantity-and-date">
            <p class="quantity"><?= htmlspecialchars($purchase['quantity']); ?> unidade(s)</p>
            <p class="date"><?= date('d/m/Y', strtotime($purchase['purchase_date'])); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
  
</body>
</html>
