<?php

use PHPUnit\Framework\TestCase;

class Cart_Test extends TestCase
{
    private $pdo;
    private $cart;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->cart = new Cart($this->pdo);
    }

    public function testInsertProductIntoCart()
    {
        $stmtCheck = $this->createMock(PDOStatement::class);
        $stmtCheck->expects($this->once())->method('execute')->willReturn(true);
        $stmtCheck->expects($this->once())->method('fetch')->willReturn(false);

        $stmtInsert = $this->createMock(PDOStatement::class);
        $stmtInsert->expects($this->once())->method('execute')->willReturn(true);

        $this->pdo->expects($this->exactly(2))
            ->method('prepare')
            ->willReturnOnConsecutiveCalls($stmtCheck, $stmtInsert);

        $result = $this->cart->insert(1, 1, 2);
        $this->assertTrue($result);
    }

    public function testIndexCart()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())->method('execute')->willReturn(true);
        $stmt->expects($this->once())->method('fetchAll')->willReturn([['product_id' => 1, 'quantity' => 2, 'nome' => 'Produto Teste']]);

        $this->pdo->expects($this->once())->method('prepare')->willReturn($stmt);

        $result = $this->cart->index(1);
        $this->assertCount(1, $result);
        $this->assertEquals('Produto Teste', $result[0]['nome']);
    }

    public function testDeleteProductFromCart()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())->method('execute')->willReturn(true);

        $this->pdo->expects($this->once())->method('prepare')->willReturn($stmt);

        $result = $this->cart->delete(1, 1);
        $this->assertTrue($result);
    }

    public function testGetCartTotalValue()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())->method('execute')->willReturn(true);
        $stmt->expects($this->once())->method('fetch')->willReturn(['total_value' => 200.0]);

        $this->pdo->expects($this->once())->method('prepare')->willReturn($stmt);

        $result = $this->cart->getCartTotalValue(1);
        $this->assertEquals(200.0, $result);
    }

    public function testCleanCart()
    {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())->method('execute')->willReturn(true);

        $this->pdo->expects($this->once())->method('prepare')->willReturn($stmt);

        $result = $this->cart->cleanCart(1);
        $this->assertTrue($result);
    }
}
?>