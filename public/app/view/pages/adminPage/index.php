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
    

    if (isset($_POST['delete'])) {
        $productController->delete($_POST['id']);
        header('Location: index.php');
        exit;
    }
}

$products = $productController->adminIndex();
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

    <main>
        <section>
                    <div id="list">

            <?php foreach ($products as $product): ?>
            <div id="product">
                <p class="id">
                    <?php echo htmlspecialchars($product['id']); ?>
                <p>
                <p class="name">
                    <?php echo htmlspecialchars($product['nome']); ?>
                </p>
                <p id="show-description">
                    <?php echo htmlspecialchars($product['descricao']); ?>
                </p>
                <p class="price">R$
                    <?php echo number_format($product['preco'], 2, ',', '.'); ?>
                </p>
                <p class="quantity">
                    <?php echo htmlspecialchars($product['quantidade']); ?>
                </p>
                <p class="productImage"><img src="<?php echo htmlspecialchars($product['imagem']); ?>"
                        alt="Imagem do Produto" style="max-width: 100px;"></p>
                <div class="actions">
                    <form method="POST" action="index.php">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="delete"
                            onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                    </form>
                    <a href="../productUpdate/index.php?id=<?php echo $product['id']; ?>">
                        <button>Atualizar</button>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            </div>
            
        </section>
        <div class="buttons">
            <a href="./purchases"><button class="pedidos" >Pedidos</button></a>
            <a href="./addProduct"><button class="pedidos" >Adicionar produto</button></a>
        </div>
        

        
    </main>
        

</body>

</html>