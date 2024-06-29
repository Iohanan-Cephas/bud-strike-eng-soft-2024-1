<?php
require_once '../../../config/config.php';
require_once(__DIR__ . '/../../../controllers/ProductController.php'); 

$productController = new ProductController($pdo);


session_start(); 
$user_id = $_SESSION['user_id'] ?? null;

if ($user_id !== 1) {
    header("Location: ../home/index.php"); 
    exit;
}

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

    if (isset($_POST['delete'])) {
        $productController->delete($_POST['id']);
        header('Location: index.php');
        exit;
    }
}

$products = $productController->index();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Listagem de Produtos</title>
</head>
<body>
    
    <div id="list">
        
    <?php foreach ($products as $product): ?>
                    <div id="product">
                        <p class="id" ><?php echo htmlspecialchars($product['id']); ?><p>
                        <p class="name" ><?php echo htmlspecialchars($product['nome']); ?></p>
                        <p id="show-description" ><?php echo htmlspecialchars($product['descricao']); ?></p>
                        <p class="price" >R$ <?php echo number_format($product['preco'], 2, ',', '.'); ?></p>
                        <p class="quantity" ><?php echo htmlspecialchars($product['quantidade']); ?></p>
                        <p class="productImage" ><img src="<?php echo htmlspecialchars($product['imagem']); ?>" alt="Imagem do Produto" style="max-width: 100px;"></p>
                        <div class="actions">
                            <form method="POST" action="index.php">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <button type="submit" name="delete" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                            </form>
                            <a href="../productUpdate/index.php?id=<?php echo $product['id']; ?>">
                                <button>Atualizar</button>
                            </a>
    </div>
                    </div>
                <?php endforeach; ?>
    </div>
    <div id="add">
        <h2>Adicionar Produto</h2>
        <form method="POST" action="index.php">
            <div id="form-container">
                <div  >
                    <label for="name">Nome:</label><br>
                    <input type="text" id="name" name="name" required><br>
                </div>
                <div>
                    <label  for="description">Descrição:</label><br>
                    <textarea id="description" name="description" required></textarea><br>
                </div>
                <div>
                    <label for="price">Preço (R$):</label><br>
                    <input type="text" id="price" name="price" required><br>
                </div>
                <div>
                    <label for="quantity">Quantidade:</label><br>
                    <input type="text" id="quantity" name="quantity" required><br>
                </div>
                <div>
                    <label for="image">URL da Imagem:</label><br>
                    <input type="text" id="image" name="image" required><br>
                </div>
                <button type="submit" name="add">Adicionar Produto</button>
            </div>
        </form>
    </div>
</body>
</html>
