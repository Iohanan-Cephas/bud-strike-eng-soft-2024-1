<?php
require_once 'app/models/Product.php';
class ProductController {

    // Método que exibe todos os produtos
    public function index() {
        $productModel = new Product();
        $products = $productModel->all();

        include 'public\index.php';
    }
    
}