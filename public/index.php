<?php
// Inclui os arquivos necessários
require_once 'app/controllers/ProductController.php';
require_once 'app/models/Product.php';
require_once 'app/config/config.php';

try {
    // Cria uma nova instância do controlador ProductController, passando a conexão PDO como argumento
    $productController = new ProductController($pdo);

    // Verifica se foi feita uma requisição para adicionar um produto
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        // Lógica para adicionar um novo produto
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $imagem = $_POST['imagem'];

        $success = $productController->create($nome, $descricao, $preco, $quantidade, $imagem);

        if ($success) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erro ao adicionar produto.";
        }
    }

    // Verifica se foi feita uma requisição para excluir um produto
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
        $productController->delete($_POST['id']);
        header('Location: index.php');
        exit;
    }

    // Obtém todos os produtos usando o método index() do controlador ProductController
    $products = $productController->index(); 

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
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Listagem de Produtos</title>
    
</head>
<body>
    
    <div id="list" >
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
                        <!-- Formulário para excluir -->
                        <form method="POST" action="index.php">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                            <button type="submit" name="delete" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                        </form>

                        <!-- Link para a página de atualização -->
                        <a href="update.php?id=<?php echo $product['id']; ?>">
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
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" required><br>
            </div>
            <div>
                <label for="descricao">Descrição:</label><br>
                <textarea id="descricao" name="descricao" required></textarea><br>
            </div>

            <div>
                <label for="preco">Preço (R$):</label><br>
                <input type="text" id="preco" name="preco" required><br>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label><br>
                <input type="text" id="quantidade" name="quantidade" required><br>
            </div>
            <div>
                <label for="imagem">URL da Imagem:</label><br>
                <input type="text" id="imagem" name="imagem" required><br>
            </div>
            <button type="submit" name="add">Adicionar Produto</button>
        </div>
    </form>
    </div>
</body>
</html>