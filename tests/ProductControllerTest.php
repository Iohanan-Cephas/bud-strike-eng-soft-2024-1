<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

require_once __DIR__ . '/../public/app/controllers/ProductController.php';
require_once __DIR__ . '/../public/app/models/Product.php';

class ProductControllerTest extends TestCase {
    private $pdoMock;
    private $productMock;
    private $productController;

    protected function setUp(): void {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->productMock = $this->createMock(Product::class);
        $this->productController = $this->getMockBuilder(ProductController::class)
                                         ->setConstructorArgs([$this->pdoMock])
                                         ->onlyMethods(['create'])
                                         ->getMock();
        $this->productController->method('create')->willReturn($this->productMock);
    }

    public function testCreate()
{
    $name = 'Product Name';
    $description = 'Product Description';
    $price = 99.99;
    $quantity = 10;
    $image = 'image.jpg';

    $stmtMock = $this->createMock(PDOStatement::class);
    $stmtMock->expects($this->once())
             ->method('execute')
             ->with([$name, $description, $price, $quantity, $image])
             ->willReturn(true);

    $this->pdoMock->expects($this->once())
                  ->method('prepare')
                  ->with('INSERT INTO produtos (nome, descricao, preco, quantidade, imagem) VALUES (?, ?, ?, ?, ?)')
                  ->willReturn($stmtMock);

    $controller = new ProductController($this->pdoMock);
    $result = $controller->create($name, $description, $price, $quantity, $image);

    $this->assertTrue($result);
}



    public function testIndex() {
        $expectedResult = [
            ['id' => 1, 'name' => 'Product 1'],
            ['id' => 2, 'name' => 'Product 2'],
        ];

        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->exactly(3))
                 ->method('fetch')
                 ->with(PDO::FETCH_ASSOC)
                 ->will($this->onConsecutiveCalls(
                     $expectedResult[0],
                     $expectedResult[1],
                     false // No more rows to fetch
                 ));

        $this->pdoMock->expects($this->once())
                      ->method('query')
                      ->with('SELECT * FROM produtos')
                      ->willReturn($stmtMock);

        $result = $this->productController->index();
        $this->assertEquals($expectedResult, $result);
    }

    public function testDelete()
{
    $productId = 1;

    $stmtMock = $this->createMock(PDOStatement::class);
    $stmtMock->expects($this->once())
             ->method('execute')
             ->with(['id' => $productId])
             ->willReturn(true);

    $this->pdoMock->expects($this->once())
                  ->method('prepare')
                  ->with('DELETE FROM produtos WHERE id = :id')
                  ->willReturn($stmtMock);

    $controller = new ProductController($this->pdoMock);
    $result = $controller->delete($productId);

    $this->assertTrue($result);
}

public function testUpdate()
{
    $productId = 1;
    $nome = 'Updated Product Name';
    $descricao = 'Updated Description';
    $preco = 199.99;
    $quantidade = 20;
    $imagem = 'updated_image.jpg';

    $stmtMock = $this->createMock(PDOStatement::class);
    $stmtMock->expects($this->once())
             ->method('execute')
             ->with([
                 'nome' => $nome,
                 'descricao' => $descricao,
                 'preco' => $preco,
                 'quantidade' => $quantidade,
                 'imagem' => $imagem,
                 'id' => $productId
             ])
             ->willReturn(true);

    $this->pdoMock->expects($this->once())
                  ->method('prepare')
                  ->with('UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade, imagem = :imagem WHERE id = :id')
                  ->willReturn($stmtMock);

    $result = $this->productController->update($productId, $nome, $descricao, $preco, $quantidade, $imagem);
    $this->assertTrue($result);
}


    public function testGetProductDetails() {
        $productId = 1;
        $expectedResult = ['id' => 1, 'name' => 'Product Name', 'description' => 'Product Description'];

        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())
                 ->method('execute')
                 ->with([$productId])
                 ->willReturn(true);
        $stmtMock->expects($this->once())
                 ->method('fetch')
                 ->with(PDO::FETCH_ASSOC)
                 ->willReturn($expectedResult);

        $this->pdoMock->expects($this->once())
                      ->method('prepare')
                      ->with('SELECT * FROM produtos WHERE id = ?')
                      ->willReturn($stmtMock);

        $result = $this->productController->getProductDetails($productId);
        $this->assertEquals($expectedResult, $result);
    }
}
?>
