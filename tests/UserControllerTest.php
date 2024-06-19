<?php
use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../public/app/controllers/UserController.php');
require_once(__DIR__ . '/../public/app/models/User.php');

class UserControllerTest extends TestCase {
    private $pdo;
    private $userController;
    private $userModel;

    protected function setUp(): void {
        // Configurar mock do PDO
        $this->pdo = $this->createMock(PDO::class);
        $this->userController = new UserController($this->pdo);
        $this->userModel = $this->createMock(User::class);

        // Iniciar a sessão para todos os testes
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Teste para o método handleRegister
    public function testHandleRegisterWithEmptyFields() {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [];

        $this->expectOutputString('Todos os campos são obrigatórios.');
        $this->userController->handleRegister();
    }

    public function testHandleRegisterWithPasswordsNotMatching() {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'username' => 'testuser',
            'password' => 'password',
            'password_confirm' => 'different_password',
            'terms' => 'on'
        ];

        $this->expectOutputString('As senhas não coincidem. Por favor, tente novamente.');
        $this->userController->handleRegister();
    }

    public function testHandleRegisterWithExistingUsername() {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'username' => 'testuser',
            'password' => 'password',
            'password_confirm' => 'password',
            'terms' => 'on'
        ];

        $this->userModel->method('findByUsername')->willReturn(['username' => 'testuser']);
        $this->userController = new UserController($this->pdo);
        
        // Usar reflection para injetar o mock do User no UserController
        $reflection = new ReflectionClass($this->userController);
        $property = $reflection->getProperty('userModel');
        $property->setAccessible(true);
        $property->setValue($this->userController, $this->userModel);

        $this->expectOutputString('Nome de usuário já existe. Por favor, escolha outro.');
        $this->userController->handleRegister();
    }

    public function testHandleRegisterSuccessful() {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'username' => 'newuser',
            'password' => 'password',
            'password_confirm' => 'password',
            'terms' => 'on'
        ];

        $this->userModel->method('findByUsername')->willReturn(false);
        $this->userModel->method('create')->willReturn(true);
        $this->userModel->method('findByUsername')->willReturn(['id' => 1]);

        $this->userController = new UserController($this->pdo);
        
        // Usar reflection para injetar o mock do User no UserController
        $reflection = new ReflectionClass($this->userController);
        $property = $reflection->getProperty('userModel');
        $property->setAccessible(true);
        $property->setValue($this->userController, $this->userModel);

        $this->expectOutputRegex('/^Location: \.\.\/home/');
        $this->userController->handleRegister();
    }

    // Teste para o método handleLogin
    public function testHandleLoginSuccessful() {
        $username = 'testuser';
        $password = 'password';
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $this->userModel->method('findByUsername')->willReturn(['id' => 1, 'username' => $username, 'password' => $hashedPassword]);

        $this->userController = new UserController($this->pdo);
        
        // Usar reflection para injetar o mock do User no UserController
        $reflection = new ReflectionClass($this->userController);
        $property = $reflection->getProperty('userModel');
        $property->setAccessible(true);
        $property->setValue($this->userController, $this->userModel);

        $this->expectOutputRegex('/^Location: index.php/');
        $this->userController->handleLogin($username, $password);
    }

    public function testHandleLoginFailed() {
        $username = 'testuser';
        $password = 'wrongpassword';

        $this->userModel->method('findByUsername')->willReturn(['id' => 1, 'username' => $username, 'password' => password_hash('password', PASSWORD_BCRYPT)]);

        $this->userController = new UserController($this->pdo);
        
        // Usar reflection para injetar o mock do User no UserController
        $reflection = new ReflectionClass($this->userController);
        $property = $reflection->getProperty('userModel');
        $property->setAccessible(true);
        $property->setValue($this->userController, $this->userModel);

        $this->expectOutputString('Usuário ou senha inválidos.');
        $this->userController->handleLogin($username, $password);
    }

    // Teste para o método logout
    public function testLogout() {
        $_SESSION['user_id'] = 1;

        $this->expectOutputRegex('/^Location: index.php/');
        $this->userController->logout();
        $this->assertArrayNotHasKey('user_id', $_SESSION);
    }

    // Teste para o método profile
    public function testProfileWithLoggedInUser() {
        $_SESSION['user_id'] = 1;

        $this->userModel->method('findById')->willReturn(['id' => 1, 'username' => 'testuser']);

        $this->userController = new UserController($this->pdo);
        
        // Usar reflection para injetar o mock do User no UserController
        $reflection = new ReflectionClass($this->userController);
        $property = $reflection->getProperty('userModel');
        $property->setAccessible(true);
        $property->setValue($this->userController, $this->userModel);

        ob_start();
        $this->userController->profile();
        $output = ob_get_clean();

        $this->assertStringContainsString('testuser', $output);
    }

    public function testProfileWithNoLoggedInUser() {
        session_unset();

        $this->expectOutputRegex('/^Location: index.php\?controller=user&action=login/');
        $this->userController->profile();
    }
}
?>