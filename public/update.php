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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/update-styles.css">
    
</head>
<body>
    <main>
    <h1>Editar Produto</h1>
   
        <form  method="POST" action="update.php?id=<?php echo $productId; ?>">
            <div id="form-container" >
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($productDetails['nome']); ?>">
                </div>
                <div>
                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="descricao"><?php echo htmlspecialchars($productDetails['descricao']); ?></textarea>
                </div>
                    
                <div>
                    <label for="preco">Preço (R$)</label>
                    <input type="text" id="preco" name="preco" value="<?php echo $productDetails['preco']; ?>">
                </div>
                    
                <div>
                    <label for="quantidade">Quantidade</label>
                    <input type="text" id="quantidade" name="quantidade" value="<?php echo $productDetails['quantidade']; ?>">
                </div>
                    
                <div>
                    <label for="imagem">URL da Imagem</label>
                    <input type="text" id="imagem" name="imagem" value="<?php echo htmlspecialchars($productDetails['imagem']); ?>">
                </div>
            </div>
            <button type="submit">Atualizar Produto</button>

        </form>
   
    </main>
    <footer>
        Budstrike &copy 2024
    </footer>
</body>
</html>