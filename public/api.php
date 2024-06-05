<?php
require_once(__DIR__ . '/app/controllers/ProductController.php');
require_once(__DIR__ . '/app/config/config.php');

// Definindo rotas
$routes = [
    '/api.php/products' => 'index',
    '/api.php/products/create' => 'create',
    '/api.php/products/update' => 'update',
    '/api.php/products/delete' => 'delete'
];

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

error_reporting(E_ALL);
ini_set('display_errors', 1);

 // Definindo uma variável $response padrão

// Função para rotear a requisição
function routeRequest($uri, $method, $routes) {
    global $response; // Declarando $response como global para acessá-la dentro da função

    $path = parse_url($uri, PHP_URL_PATH);

    if (isset($routes[$path])) {
        $action = $routes[$path];

        // Instanciando o controlador de produtos
        $productController = new ProductController($GLOBALS['pdo']);

        // Roteamento com base no método HTTP
        switch ($method) {
            case 'GET':
                
                if ($action === 'index') {
                    
                    $response = $productController->index();
                    echo json_encode($response);
                }
                break;
            case 'POST':
                if ($action === 'create') {
                    // Criar um novo produto
                    // Você precisará obter os dados do corpo da solicitação ($_POST, $_GET ou JSON)
                    // e passá-los para o método create do controlador de produtos
                }
                break;
            case 'PUT':
                if ($action === 'update') {
                    // Atualizar um produto existente
                    // Você precisará obter os dados do corpo da solicitação ($_POST, $_GET ou JSON)
                    // e passá-los para o método update do controlador de produtos
                }
                break;
            case 'DELETE':
                if ($action === 'delete') {
                    // Deletar um produto existente
                    // Você precisará obter o ID do produto da solicitação e passá-lo para o método delete do controlador de produtos
                }
                break;
            default:
                // Método não suportado
                http_response_code(405); // Método não permitido
                exit();
        }

        // Imprimir a resposta
    } else {
        // Rota não encontrada
        http_response_code(404); // Não encontrado
        exit();
    }
}

// Roteamento da requisição
routeRequest($requestUri, $requestMethod, $routes);
?>
