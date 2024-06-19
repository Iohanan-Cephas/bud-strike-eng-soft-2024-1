<?php
require_once '../../../config/config.php';
require_once(__DIR__ . '/../../../controllers/ProductController.php'); // Alterado para ProductController.php

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
            // echo "Erro ao adicionar produto.";
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
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço (R$)</th>
                    <th>Quantidade</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($product['id']); ?></td>
                        <td><?php echo htmlspecialchars($product['nome']); ?></td>
                        <td><?php echo htmlspecialchars($product['descricao']); ?></td>
                        <td>R$ <?php echo number_format($product['preco'], 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($product['quantidade']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($product['imagem']); ?>" alt="Imagem do Produto" style="max-width: 100px;"></td>
                        <td class="actions">
                            <form method="POST" action="index.php">
                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                <button type="submit" name="delete" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                            </form>
                            <a href="../productUpdate/index.php?id=<?php echo $product['id']; ?>">
                                <button>Atualizar</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div id="add">
        <h2>Adicionar Produto</h2>
        <form method="POST" action="index.php">
            <div id="form-container">
                <div>
                    <label for="name">Nome:</label><br>
                    <input type="text" id="name" name="name" required><br>
                </div>
                <div>
                    <label for="description">Descrição:</label><br>
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

