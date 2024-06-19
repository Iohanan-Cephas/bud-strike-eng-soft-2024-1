<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

require_once(__DIR__ . '/../public/app/controllers/CartController.php');
require_once(__DIR__ . '/../public/app/models/Cart.php');

class CartControllerTest extends TestCase {
    private $pdoMock;
    private $cartMock;
    private $cartController;

    protected function setUp(): void {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->cartMock = $this->createMock(Cart::class);
        $this->cartController = $this->getMockBuilder(CartController::class)
                                     ->setConstructorArgs([$this->pdoMock])
                                     ->onlyMethods(['createCartModel'])
                                     ->getMock();
        $this->cartController->method('createCartModel')->willReturn($this->cartMock);
    }

    public function testInsert() {
        $user_id = 1;
        $product_id = 2;
        $quantity = 3;

        $this->cartMock->expects($this->once())
                       ->method('insert')
                       ->with($user_id, $product_id, $quantity)
                       ->willReturn(true);

        $result = $this->cartController->insert($user_id, $product_id, $quantity);
        $this->assertTrue($result);
    }

    public function testIndex() {
        $user_id = 1;
        $expectedResult = [
            ['product_id' => 1, 'quantity' => 2],
            ['product_id' => 2, 'quantity' => 3],
        ];

        $this->cartMock->expects($this->once())
                       ->method('index')
                       ->with($user_id)
                       ->willReturn($expectedResult);

        $result = $this->cartController->index($user_id);
        $this->assertEquals($expectedResult, $result);
    }

    public function testDelete() {
        $user_id = 1;
        $product_id = 2;

        $this->cartMock->expects($this->once())
                       ->method('delete')
                       ->with($user_id, $product_id)
                       ->willReturn(true);

        $result = $this->cartController->delete($user_id, $product_id);
        $this->assertTrue($result);
    }

    public function testGetQuantityById() {
        $user_id = 1;
        $expectedResult = 5;

        $this->cartMock->expects($this->once())
                       ->method('quantityById')
                       ->with($user_id)
                       ->willReturn($expectedResult);

        $result = $this->cartController->getQuantityById($user_id);
        $this->assertEquals($expectedResult, $result);
    }

    public function testUpdateQuantity() {
        $user_id = 1;
        $product_id = 2;
        $change = 3;

        $this->cartMock->expects($this->once())
                       ->method('updateQuantity')
                       ->with($user_id, $product_id, $change)
                       ->willReturn(true);

        $result = $this->cartController->updateQuantity($user_id, $product_id, $change);
        $this->assertTrue($result);
    }

    public function testGetCartTotalValue() {
        $user_id = 1;
        $expectedResult = 100.50;

        $this->cartMock->expects($this->once())
                       ->method('getCartTotalValue')
                       ->with($user_id)
                       ->willReturn($expectedResult);

        $result = $this->cartController->getCartTotalValue($user_id);
        $this->assertEquals($expectedResult, $result);
    }

    public function testCleanCart() {
        $user_id = 1;

        $this->cartMock->expects($this->once())
                       ->method('cleanCart')
                       ->with($user_id)
                       ->willReturn(true);

        $result = $this->cartController->cleanCart($user_id);
        $this->assertTrue($result);
    }
}
?>