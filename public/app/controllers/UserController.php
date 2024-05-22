<?php
require_once(__DIR__ . '/../models/User.php');


class UserController {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Exibe a página de registro
    public function register() {
        include '../views/pages/register/register.php';
    }

    // Processa o registro do usuário
    public function handleRegister() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_confirm']) && isset($_POST['terms'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password_confirm = $_POST['password_confirm'];
    
                if ($password !== $password_confirm) {
                    echo "As senhas não coincidem. Por favor, tente novamente.";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $userModel = new User($this->pdo);
    
                    if ($userModel->create($username, $hashedPassword)) {
                        header("Location: index.php?controller=home&action=index");
                        exit;
                    } else {
                        echo "Erro ao registrar usuário. Tente novamente.";
                    }
                }
            }
        }
    }
   
    // Exibe a página de login
    public function login() {
        include '../views/pages/login/login.php';
    }

    // Processa o login do usuário
    public function handleLogin($username, $password) {
        $userModel = new User($this->pdo);
        $user = $userModel->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header('Location: index.php');
        } else {
            echo "Usuário ou senha inválidos.";
        }
    }

    // Processa o logout do usuário
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
    }

    // Exibe detalhes do usuário logado
    public function profile() {
        session_start();
        if (isset($_SESSION['user_id'])) {
            $userModel = new User($this->pdo);
            $user = $userModel->findById($_SESSION['user_id']);
            include '../views/pages/profile/profile.php';
        } else {
            header('Location: index.php?controller=user&action=login');
        }
    }
}
?>
