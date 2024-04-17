<?php
require_once 'app/models/Product.php';


class ProductController {
    private $pdo;


    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }


    public function index() {
        $productModel = new Product($this->pdo);
        return $productModel->all();
    }


    public function delete($productId) {
        $productModel = new Product($this->pdo);
        $productModel->delete($productId);
    }
}
?>
