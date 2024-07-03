<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../public/app/models/User.php';

class UserTest extends TestCase
{
    private $pdo;
    private $user;

    // Configura a mock do PDO e a instância da classe User antes de cada teste
    protected function setUp(): void
    {
        $this->pdo = $this->createMock(PDO::class);
        $this->user = new User($this->pdo);
    }

    // Testa se o método create executa a query de inserção e retorna true
    public function testCreate_ExecutesInsertQueryAndReturnsTrue()
    {
        // Parâmetros do usuário que serão inseridos
        $username = 'testuser';
        $password = 'password';
        $email = 'testuser@example.com';
        $first_name = 'Test';
        $last_name = 'User';
        $address = 'rua 5 9';
        $city = 'Palmas';
        $state = 'TO';

        // Cria uma mock de PDOStatement
        $stmt = $this->createMock(PDOStatement::class);
        
        // Espera que o método execute seja chamado uma vez com os parâmetros corretos
        $stmt->expects($this->once())
             ->method('execute')
             ->with($this->equalTo([$username, $password, $email, $first_name, $last_name, $address, $city, $state]))
             ->willReturn(true);

        // Espera que o método prepare do PDO seja chamado uma vez com a query correta
        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->with($this->stringContains('INSERT INTO usuarios'))
                  ->willReturn($stmt);

        // Chama o método create com todos os parâmetros necessários e verifica se o retorno é true
        $result = $this->user->create($username, $password, $email, $first_name, $last_name, $address, $city, $state);
        $this->assertTrue($result);
    }

    // Testa se o método findByUsername executa a query de seleção e retorna um array de usuário
    public function testFindByUsername_ExecutesSelectQueryAndReturnsUserArray()
    {
        $username = 'testuser';

        // Cria uma mock de PDOStatement
        $stmt = $this->createMock(PDOStatement::class);
        
        // Espera que o método execute seja chamado uma vez com o parâmetro correto
        $stmt->expects($this->once())
             ->method('execute')
             ->with($this->equalTo([$username]))
             ->willReturn(true);

        // Espera que o método fetch retorne um array com os dados do usuário
        $stmt->expects($this->once())
             ->method('fetch')
             ->willReturn(['id' => 1, 'username' => $username, 'password' => 'password']);

        // Espera que o método prepare do PDO seja chamado uma vez com a query correta
        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->with($this->stringContains('SELECT * FROM usuarios WHERE username ='))
                  ->willReturn($stmt);

        // Chama o método findByUsername e verifica se o retorno é um array com os dados do usuário
        $result = $this->user->findByUsername($username);
        $this->assertIsArray($result);
        $this->assertSame(['id' => 1, 'username' => $username, 'password' => 'password'], $result);
    }

    // Testa se o método findByUsername retorna false quando o usuário não é encontrado
    public function testFindByUsername_UserNotFound_ReturnsNull()
    {
        $username = 'nonexistentuser';

        // Cria uma mock de PDOStatement
        $stmt = $this->createMock(PDOStatement::class);
        
        // Espera que o método execute seja chamado uma vez com o parâmetro correto
        $stmt->expects($this->once())
             ->method('execute')
             ->with($this->equalTo([$username]))
             ->willReturn(true);

        // Espera que o método fetch retorne false indicando que o usuário não foi encontrado
        $stmt->expects($this->once())
             ->method('fetch')
             ->willReturn(false);

        // Espera que o método prepare do PDO seja chamado uma vez com a query correta
        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->with($this->stringContains('SELECT * FROM usuarios WHERE username ='))
                  ->willReturn($stmt);

        // Chama o método findByUsername e verifica se o retorno é false
        $result = $this->user->findByUsername($username);
        $this->assertFalse($result);
    }
}
