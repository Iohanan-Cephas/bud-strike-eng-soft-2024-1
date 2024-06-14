<?php
session_start();

if (!(isset($_SESSION['user_id']))) {
    header("Location: ../login");
    exit();
}

require_once(__DIR__ . '/../../../config/config.php');
require_once(__DIR__ . '/../../../controllers/ProductController.php');

try {
  // Instanciar o controlador de produto passando a conexão PDO
  $productController = new ProductController($pdo);

  // Obter o ID do produto da query string
  $productId = $_GET['id'] ?? null;

  // Obter os detalhes do produto usando o método getProductDetails do ProductController
  $productDetails = $productController->getProductDetails($productId);
} catch (PDOException $e) {
  // Em caso de erro na conexão PDO
  echo 'Erro de conexão: ' . $e->getMessage();
  exit;
} catch (Exception $e) {
  // Em caso de outras exceções
  echo 'Erro: ' . $e->getMessage();
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
  <title>BudStrike</title>
</head>
<body>
  <header>
    <div id="options">
        <svg id="menuButton" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-menu">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
        <h1>BudStrike</h1>
        <a href="../cart/"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-shopping-cart">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg></a>

    </div>
</header>
<div  id="menu" >
    <div id="menu-side">
        <nav>
            <ul>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>Meu carrinho</li>
                <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>Meus pedidos</li>
                <li> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>Termos de uso</li>
                <li> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>Sair</li>
            </ul>
        </nav>
        <div id="username" >
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Micael
        </div>
    </div>

    <div id="close-side">

    </div>
    
</div>
<main>
    <div id="product-image">
      <img src="<?php echo $productDetails['imagem']; ?>" alt="Imagem do Produto">
    </div>
    <div id="price-and-stars">
      <p id="price">R$ <?php echo number_format($productDetails['preco'], 2, ',', '.'); ?></p>
      <!-- Supondo que haja uma seção de estrelas ou avaliações -->
      <div id="stars">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="orange" stroke="orange" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
        <p>5.0</p> <!-- Valor estático de exemplo -->
      </div>
    </div>
    <p id="name"><?php echo $productDetails['nome']; ?></p>
    <p id="description"><?php echo $productDetails['descricao']; ?></p>
    <div id="free-shipping">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
      <p>Frete grátis</p> <!-- Valor estático de exemplo -->
    </div>
    <section id="button-section">
      <button id="buy-now">Comprar agora</button>
      <button id="add-to-cart">Adicionar ao carrinho</button>
    </section>
  </main>
  <footer>
  BudStrike &copy; 2024
</footer>
<script src="./script.js"></script>
</body>
</html>