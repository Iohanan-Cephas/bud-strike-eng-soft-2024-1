<?php
require_once dirname(__DIR__) . '/config/config.php';


class Product {
    private $pdo;


    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $description, $price, $quantity, $image) {
        $stmt = $this->pdo->prepare('INSERT INTO produtos (nome, descricao, preco, quantidade, imagem) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$name, $description, $price, $quantity, $image]);
    }
    

    public function all() {
        $stmt = $this->pdo->query('SELECT * FROM produtos');
       
        // Fetch em lotes para evitar estourar a memória
        $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
        }


        return $products;
    }


    public function delete($productId) {
        $stmt = $this->pdo->prepare('DELETE FROM produtos WHERE id = :id');
        $stmt->execute(['id' => $productId]);
    }
}
?>
