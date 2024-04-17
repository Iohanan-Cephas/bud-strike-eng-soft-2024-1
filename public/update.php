<?php
// Inclui os arquivos necessários
require_once 'app/controllers/ProductController.php';
require_once 'app/models/Product.php';
require_once 'app/config/config.php';

// Verifica se foi passado o ID do produto na URL
if (!isset($_GET['id'])) {
    echo "ID do produto não fornecido.";
    exit;
}

// Obtém o ID do produto da URL
$productId = $_GET['id'];

try {
    // Cria uma nova instância do controlador ProductController, passando a conexão PDO como argumento
    $productController = new ProductController($pdo);

    // Obtém os detalhes do produto pelo ID
    $productDetails = $productController->getProductDetails($productId);

    // Verifica se o produto existe
    if (!$productDetails) {
        echo "Produto não encontrado.";
        exit;
    }

    // Verifica se foi feita uma requisição para atualizar o produto
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lógica para atualizar o produto
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $imagem = $_POST['imagem'];

        $success = $productController->update($productId, $nome, $descricao, $preco, $quantidade, $imagem);

        if ($success) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erro ao atualizar produto.";
        }
    }
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
    <title>Atualizar Produto</title>
    <!-- Estilos CSS aqui -->
</head>
<body>
    <h1>Atualizar Produto</h1>
    <form method="POST" action="update.php?id=<?php echo $productId; ?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($productDetails['nome']); ?>"><br>

        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao"><?php echo htmlspecialchars($productDetails['descricao']); ?></textarea><br>

        <label for="preco">Preço (R$):</label><br>
        <input type="text" id="preco" name="preco" value="<?php echo $productDetails['preco']; ?>"><br>

        <label for="quantidade">Quantidade:</label><br>
        <input type="text" id="quantidade" name="quantidade" value="<?php echo $productDetails['quantidade']; ?>"><br>

        <label for="imagem">URL da Imagem:</label><br>
        <input type="text" id="imagem" name="imagem" value="<?php echo htmlspecialchars($productDetails['imagem']); ?>"><br>

        <button type="submit">Atualizar Produto</button>
    </form>
</body>
</html>