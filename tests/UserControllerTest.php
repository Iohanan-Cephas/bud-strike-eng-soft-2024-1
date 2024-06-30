<?php
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../public/app/controllers/UserController.php');
require_once(__DIR__ . '/../public/app/models/User.php');

class UserControllerTest extends TestCase
{
    protected $pdo;
    protected $user;

    protected function setUp(): void
    {
        // Configurar um PDO mockado para os testes
        $this->pdo = $this->createMock(PDO::class);
        $this->user = new User($this->pdo);
    }

    public function testCreateUser()
{
    // Mock do PDOStatement para simular a execução bem-sucedida da query
    $stmtMock = $this->createMock(PDOStatement::class);
    $stmtMock->expects($this->once())
             ->method('execute')
             ->willReturn(true); // Simula a execução bem-sucedida da query

    $this->pdo->expects($this->once())
              ->method('prepare')
              ->willReturn($stmtMock);

    // Testar o método create
    $result = $this->user->create('testuser', 'hashedpassword', 'Doe', '123 Street', 'City', 'UF', '123456789', 'test@example.com');

    $this->assertTrue($result);
}


    public function testFindByUsername()
    {
        // Simular o resultado de uma busca por username
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())
                 ->method('execute')
                 ->willReturn(true);

        $stmtMock->expects($this->once())
                 ->method('fetch')
                 ->willReturn(['id' => 1, 'username' => 'testuser', 'password' => 'hashedpassword']); // Exemplo de dados retornados

        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->willReturn($stmtMock);

        // Testar o método findByUsername
        $result = $this->user->findByUsername('testuser');

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals('testuser', $result['username']);
    }

    public function testFindById()
    {
        // Simular o resultado de uma busca por ID
        $stmtMock = $this->createMock(PDOStatement::class);
        $stmtMock->expects($this->once())
                 ->method('execute')
                 ->willReturn(true);

        $stmtMock->expects($this->once())
                 ->method('fetch')
                 ->willReturn(['id' => 1, 'username' => 'testuser', 'password' => 'hashedpassword']); // Exemplo de dados retornados

        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->willReturn($stmtMock);

        // Testar o método findById
        $result = $this->user->findById(1);

        $this->assertArrayHasKey('id', $result);
        $this->assertEquals('testuser', $result['username']);
    }
}
?>
