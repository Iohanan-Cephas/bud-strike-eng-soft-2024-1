<?php 
session_start(); 
$user_id = $_SESSION['user_id'] ?? null;

if ($user_id !== 1) {
    header("Location: ../home/index.php"); 
    exit;
}

require_once '../../../../config/config.php';
require_once(__DIR__ . '/../../../../controllers/ProductController.php'); 
$productController = new ProductController($pdo);




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $image = $_POST['image'];

        $success = $productController->create($name, $description, $price, $quantity, $image);
        if ($success) {
            header("Location: index.php");
            exit;
        } else {
            
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../styles.css">
  <title>Document</title>

  
</head>
<body class="body-add-page" >
<div id="add">
            <h2>Adicionar Produto</h2>
            <form method="POST" action="index.php">
                <div id="form-container">
                    <div>
                        <label for="name">Nome:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div>
                        <label for="description">Descrição:</label>
                        <textarea id="description" name="description" required></textarea>
                    </div>
                    <div>
                        <label for="price">Preço (R$):</label>
                        <input type="text" id="price" name="price" required>
                    </div>
                    <div>
                        <label for="quantity">Quantidade:</label>
                        <input type="text" id="quantity" name="quantity" required>
                    </div>
                    <div>
                        <label for="image">URL da Imagem:</label>
                        <input type="text" id="image" name="image" required>
                    </div>
                    <button  type="submit" name="add">Adicionar Produto</button>
                </div>
            </form>
            </div>
</body>
</html>