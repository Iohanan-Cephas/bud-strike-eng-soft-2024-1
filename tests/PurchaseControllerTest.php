<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../public/app/controllers/PurchaseController.php');

class PurchaseControllerTest extends TestCase
{
    private $pdo;
    private $controller;

    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->controller = new PurchaseController($this->pdo);
    }

    public function testInsertAllCart_ExecutesInsertQueryAndReturnsTrue()
    {
        $user_id = 1;

        // Mock PDOStatement
        $stmt = $this->createMock(PDOStatement::class);

        // Expect prepare and execute to be called once
        $stmt->expects($this->once())
             ->method('execute')
             ->with($this->equalTo([':user_id' => $user_id]))
             ->willReturn(true);

        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->with($this->stringContains('INSERT INTO purchases'))
                  ->willReturn($stmt);

        $result = $this->controller->insertAllCart($user_id);
        $this->assertTrue($result);
    }

    public function testInsertOne_ExecutesInsertQueryAndReturnsTrue()
    {
        $user_id = 1;
        $product_id = 2;
        $quantity = 3;

        // Mock PDOStatement
        $stmt = $this->createMock(PDOStatement::class);

        // Expect prepare and execute to be called once
        $stmt->expects($this->once())
             ->method('execute')
             ->with($this->equalTo([
                 ':user_id' => $user_id,
                 ':product_id' => $product_id,
                 ':quantity' => $quantity
             ]))
             ->willReturn(true);

        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->with($this->stringContains('INSERT INTO purchases'))
                  ->willReturn($stmt);

        $result = $this->controller->insertOne($user_id, $product_id, $quantity);
        $this->assertTrue($result);
    }

    public function testIndex_ReturnsArrayOfPurchases()
    {
        $user_id = 1;
        $expectedResult = [['id' => 1, 'user_id' => $user_id, 'product_id' => 1, 'quantity' => 2]]; // Mocked result

        // Mock PDOStatement
        $stmt = $this->createMock(PDOStatement::class);

        // Expect prepare and execute to be called once
        $stmt->expects($this->once())
             ->method('execute')
             ->with($this->equalTo([':user_id' => $user_id]))
             ->willReturn(true);

        $stmt->expects($this->once())
             ->method('fetchAll')
             ->with(PDO::FETCH_ASSOC)
             ->willReturn($expectedResult);

        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->with($this->stringContains('SELECT * FROM purchases WHERE user_id ='))
                  ->willReturn($stmt);

        $result = $this->controller->index($user_id);
        $this->assertEquals($expectedResult, $result);
    }
}
?>
