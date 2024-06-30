<?php
require_once dirname(__DIR__) . '/config/config.php';


class Product {
    private $pdo;


    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $description, $price, $quantity, $image) {
        $stmt = $this->pdo->prepare('INSERT INTO produtos (nome, descricao, preco, quantidade, imagem) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$name, $description, $price, $quantity, $image]);
    }

    public function all() {
        $stmt = $this->pdo->query('SELECT * FROM produtos');
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
    public function update($productId, $nome, $descricao, $preco, $quantidade, $imagem) {
        $stmt = $this->pdo->prepare('UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade, imagem = :imagem WHERE id = :id');
        return $stmt->execute(['nome' => $nome, 'descricao' => $descricao, 'preco' => $preco, 'quantidade' => $quantidade, 'imagem' => $imagem, 'id' => $productId]);
    }
    public function getDetailsById($productId) {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$productId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
