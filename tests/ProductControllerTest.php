<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../public/app/controllers/ProductController.php';
require_once __DIR__ . '/../public/app/models/Product.php';

class ProductControllerTest extends TestCase
{
    private $pdoMock;
    private $productController;

    public function setUp(): void
    {
        $this->pdoMock = $this->prophesize(PDO::class);
        $this->productController = new ProductController($this->pdoMock->reveal());
    }

    public function testCreateProductSuccess()
    {
        $name = "Test Product";
        $description = "This is a test description";
        $price = 19.99;
        $quantity = 10;
        $image = "image.jpg";

        $this->pdoMock->createStmt(Argument::any())->shouldBeCalledOnce()->willReturn(true);

        $result = $this->productController->create($name, $description, $price, $quantity, $image);

        $this->assertEquals("Product created successfully!", $result); // Assert the expected message
    }

    public function testCreateProductFail()
    {
        $name = "Test Product";
        $description = "This is a test description";
        $price = 19.99;
        $quantity = 10;
        $image = "image.jpg";

        $this->pdoMock->createStmt(Argument::any())->shouldBeCalledOnce()->willReturn(false);

        $result = $this->productController->create($name, $description, $price, $quantity, $image);

        $this->assertEquals("Error creating product.", $result); // Assert the expected message
    }

    public function testIndexRetrievesProducts()
    {
        $products = [
            ["id" => 1, "name" => "Product 1"],
            ["id" => 2, "name" => "Product 2"],
        ];

        $this->pdoMock->query(Argument::any())->shouldBeCalledOnce()->willReturnStatement(
            $this->prophesize(\PDOStatement::class)->reveal()
                ->setFetchMode(\PDO::FETCH_ASSOC)
                ->fetchAll(\PDO::FETCH_ASSOC)
                ->willReturn($products)
        );

        $result = $this->productController->index();

        $this->assertEquals($products, $result); // Assert the expected array of products
    }

    public function testDeleteProduct()
    {
        $productId = 1;

        $this->pdoMock->prepare(Argument::any())->shouldBeCalledOnce()->willReturn(true);

        $result = $this->productController->delete($productId);

        $this->assertEquals("Product deleted successfully.", $result); // Assert the expected message
    }
}
