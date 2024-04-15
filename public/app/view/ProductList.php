<?php
require_once 'app/models/Product.php';
// simplesmente não consigo só usar o require_once 'app/config/config.php';
$pdo = new PDO("mysql:host=db;dbname=budstrike","root","root");

// Instancia o modelo Product passando a conexão PDO
$productModel = new Product($pdo);

// Obtém todos os produtos
$products = $productModel->all();
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
                        <form method="POST" action="/product/edit">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <button type="submit">Editar</button>
                        </form>
                        <form method="POST" action="/product/delete">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>