<?php
require_once(__DIR__ . '/../models/Product.php');


class ProductController {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $description, $price, $quantity, $image) {
        $productModel = new Product($this->pdo);
        return $productModel->create($name, $description, $price, $quantity, $image);
    }

    public function index() {
        $productModel = new Product($this->pdo);
        return $productModel->all();
    }

    public function delete($productId) {
        $productModel = new Product($this->pdo);
        $productModel->delete($productId);
    }

    public function update($productId, $nome, $descricao, $preco, $quantidade, $imagem) {
        $productModel = new Product($this->pdo);
        return $productModel->update($productId, $nome, $descricao, $preco, $quantidade, $imagem);
    }

    public function getProductDetails($productId) {
        $productModel = new Product($this->pdo);
        return $productModel->getDetailsById($productId);
    }
}
?>
