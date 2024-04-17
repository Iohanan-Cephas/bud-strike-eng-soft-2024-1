<?php
// Inclui os arquivos necessários
require_once 'app/controllers/ProductController.php';
require_once 'app/models/Product.php';


// Parâmetros de conexão com o banco de dados
$db_name = 'budstrike';
$db_host = 'db';
$db_user = 'root';
$db_password = 'root';


try {
    // Cria uma nova instância do PDO para conexão com o banco de dados
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Cria uma instância do controlador ProductController, passando a conexão PDO como argumento
    $productController = new ProductController($pdo);


    // Verifica se foi feita uma requisição para excluir um produto
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        // Chama o método de exclusão do controlador
        $productController->delete($_POST['id']);


        // Opcional: Redireciona para a mesma página para atualizar a lista de produtos após a exclusão
        header('Location: /index.php');
        exit;
    }


    // Obtém todos os produtos usando o método index() do controlador ProductController
    $products = $productController->index(); // Este método deve chamar $productModel->all()


} catch (PDOException $e) {
    // Trata qualquer erro de conexão com o banco de dados
    echo "Erro de conexão: " . $e->getMessage();
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #343a40;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .actions {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <h1>Listagem de Produtos</h1>
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
                    <td><?php echo $product['descricao']; ?></td>
                    <td><?php echo number_format($product['preco'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($product['quantidade']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($product['imagem']); ?>" alt="Imagem do Produto" style="max-width: 100px;"></td>
                    <td class="actions">
                        <form method="POST" action="/index.php">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>