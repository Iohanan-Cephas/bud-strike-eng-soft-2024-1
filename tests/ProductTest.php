<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    private $pdo;
    private $product;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->product = new Product($this->pdo);
    }

    public function testCreateProduct()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())->method('execute')->willReturn(true);
        $this->pdo->expects($this->once())->method('prepare')->willReturn($stmt);

        $result = $this->product->create('Produto Teste', 'Descrição Teste', 100.0, 10, 'imagem.png');
        $this->assertTrue($result);
    }

    public function testGetAllProducts()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())->method('fetch')->willReturnOnConsecutiveCalls(['id' => 1, 'nome' => 'Produto 1'], false);
        $this->pdo->expects($this->once())->method('query')->willReturn($stmt);

        $result = $this->product->all();
        $this->assertCount(1, $result);
        $this->assertEquals('Produto 1', $result[0]['nome']);
    }

    public function testDeleteProduct()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())->method('execute')->willReturn(true);
        $this->pdo->expects($this->once())->method('prepare')->willReturn($stmt);

        $this->product->delete(1);
        $this->assertTrue(true); // Apenas para garantir que não houve exceção
    }

    public function testUpdateProduct()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())->method('execute')->willReturn(true);
        $this->pdo->expects($this->once())->method('prepare')->willReturn($stmt);

        $result = $this->product->update(1, 'Produto Atualizado', 'Descrição Atualizada', 150.0, 20, 'imagem2.png');
        $this->assertTrue($result);
    }

    public function testGetDetailsById()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())->method('execute')->willReturn(true);
        $stmt->expects($this->once())->method('fetch')->willReturn(['id' => 1, 'nome' => 'Produto Detalhe']);
        $this->pdo->expects($this->once())->method('prepare')->willReturn($stmt);

        $result = $this->product->getDetailsById(1);
        $this->assertEquals('Produto Detalhe', $result['nome']);
    }
}
?>