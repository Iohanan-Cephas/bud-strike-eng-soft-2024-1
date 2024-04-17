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

    // Obtém o ID do produto da URL ou do formulário, caso disponível
    $productId = $_GET['id'] ?? $_POST['id'] ?? null;

    if (!$productId) {
        header("Location: index.php"); // Redireciona se não houver ID
        exit;
    }

    // Verifica se foi passado o ID do produto a ser atualizado
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Obtém os detalhes do produto com base no ID
        $productDetails = $productController->getProductDetails($productId);

        // Verifica se o produto foi encontrado
        if ($productDetails) {
            // Pré-preenche os campos do formulário com os detalhes do produto atual
            $nome = $productDetails['nome'];
            $descricao = $productDetails['descricao'];
            $preco = $productDetails['preco'];
            $quantidade = $productDetails['quantidade'];
            $imagem = $productDetails['imagem'];
        } else {
            // Se o produto não for encontrado, redireciona para a página de listagem
            header("Location: index.php");
            exit;
        }
    }

    // Verifica se o formulário foi submetido para atualização
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os dados atualizados do formulário
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $imagem = $_POST['imagem'];

        // Atualiza o produto no banco de dados
        $success = $productController->update($productId, $nome, $descricao, $preco, $quantidade, $imagem);

        if ($success) {
            // Se a atualização for bem-sucedida, redireciona de volta para a página de listagem
            header("Location: index.php");
            exit;
        } else {
            // Se houver um erro na atualização, exibe uma mensagem de erro
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
    <title>Atualização de Produto</title>
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
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Atualização de Produto</h1>
    <form method="POST" action="update.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($productId); ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($nome); ?>"><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"><?php echo htmlspecialchars($descricao); ?></textarea><br>

        <label for="preco">Preço (R$):</label>
        <input type="text" id="preco" name="preco" value="<?php echo htmlspecialchars($preco); ?>"><br>

        <label for="quantidade">Quantidade:</label>
        <input type="text" id="quantidade" name="quantidade" value="<?php echo htmlspecialchars($quantidade); ?>"><br>

        <label for="imagem">URL da Imagem:</label>
        <input type="text" id="imagem" name="imagem" value="<?php echo htmlspecialchars($imagem); ?>"><br>

        <button type="submit">Atualizar Produto</button>
    </form>
</body>
</html>