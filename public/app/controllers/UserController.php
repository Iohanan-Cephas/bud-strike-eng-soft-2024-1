<?php
require_once(__DIR__ . '/../models/User.php');

class UserController {
    private $pdo;
    private $userModel;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        $this->userModel = new User($this->pdo); // Adiciona o modelo User
    }

    public function setUserModel($userModel) {
        $this->userModel = $userModel;
    }

    // Exibe a página de registro
    public function register() {
        include '../views/pages/register/register.php';
    }

    // Processa o registro do usuário
    public function handleRegister() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password_confirm']) && !empty($_POST['terms'])) {
                $username = trim($_POST['username']);
                $password = trim($_POST['password']);
                $password_confirm = trim($_POST['password_confirm']);
                $terms = $_POST['terms'];

                if ($password !== $password_confirm) {
                    echo "As senhas não coincidem. Por favor, tente novamente.";
                } else {
                    if ($terms != 'on') {
                        echo "Você deve aceitar os termos e condições.";
                    } else {
                        if ($this->userModel->findByUsername($username)) {
                            echo "Nome de usuário já existe. Por favor, escolha outro.";
                        } else {
                            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                            try {
                                if ($this->userModel->create($username, $hashedPassword)) {
                                    session_start();
                                    $_SESSION['user_id'] = $this->userModel->findByUsername($username)['id'];
                                    header("Location: ../home");
                                    exit;
                                } else {
                                    echo "Erro ao registrar usuário. Tente novamente.";
                                }
                            } catch (PDOException $e) {
                                echo "Erro ao registrar usuário: " . $e->getMessage();
                            }
                        }
                    }
                }
            } else {
                echo "Todos os campos são obrigatórios.";
            }
        }
    }

    // Exibe a página de login
    public function login() {
        include '../views/pages/login/login.php';
    }

    // Processa o login do usuário
    public function handleLogin($username, $password) {
        $user = $this->userModel->findByUsername($username);
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
            $user = $this->userModel->findById($_SESSION['user_id']);
            include '../views/pages/profile/profile.php';
        } else {
            header('Location: index.php?controller=user&action=login');
        }
    }

    public function getUserDetails(){
        if (isset($_SESSION['user_id'])) {
            $userDetails = $this->userModel->getUserbyId($_SESSION['user_id']);
            return $userDetails;
        }
    }
}
?>
