<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\ProductController;
use App\Models\Product;

class ProductControllerTest extends TestCase
{
    public function testCreate()
    {
        // Crie um mock do PDO
        $pdo = $this->createMock(PDO::class);

        // Crie um mock do Product
        $product = $this->createMock(Product::class);

        // Defina o método create do mock para retornar true
        $product->method('create')->willReturn(true);

        // Substitua a instância de Product no ProductController pelo mock
        $productController = new ProductController($pdo, $product);

        // Teste o método create
        $result = $productController->create('Nome', 'Descrição', 100, 50, 'imagem.jpg');
        $this->assertTrue($result);
    }
}