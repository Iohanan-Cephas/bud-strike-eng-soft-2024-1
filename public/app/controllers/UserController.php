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
            // Verificar se todos os campos necessários estão presentes
            $required_fields = ['username', 'lastName', 'address', 'city', 'uf', 'telefone', 'email', 'password', 'password_confirm', 'terms'];
            $all_fields_present = true;
            
            foreach ($required_fields as $field) {
                if (empty($_POST[$field])) {
                    $all_fields_present = false;
                    break;
                }
            }
            
            if ($all_fields_present) {
                $username = trim($_POST['username']);
                $lastName = trim($_POST['lastName']);
                $address = trim($_POST['address']);
                $city = trim($_POST['city']);
                $uf = $_POST['uf'];
                $telefone = trim($_POST['telefone']);
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $password_confirm = trim($_POST['password_confirm']);
                $terms = $_POST['terms'];
                
                // Verificar se as senhas coincidem
                if ($password !== $password_confirm) {
                    echo "As senhas não coincidem. Por favor, tente novamente.";
                } else {
                    // Verificar se os termos foram aceitos
                    if ($terms != 'on') {
                        echo "Você deve aceitar os termos e condições.";
                    } else {
                        // Verificar se o nome de usuário já existe
                        $userModel = new User($this->pdo);
                        if ($userModel->findByUsername($username)) {
                            echo "Nome de usuário já existe. Por favor, escolha outro.";
                        } else {
                            // Hash da senha
                            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                            
                            // Tentar criar o usuário
                            try {
                                if ($userModel->create($username, $hashedPassword, $lastName, $address, $city, $uf, $telefone, $email)) {
                                    // Iniciar a sessão e definir a variável de sessão
                                    $_SESSION['user_id'] = $userModel->findByUsername($username)['id'];
                                    
                                    // Redirecionar para a página inicial em caso de sucesso
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

    public function getUserDetails(){
        if (isset($_SESSION['user_id'])) {
            $userModel = new User($this->pdo);
            $userDetails = $userModel->getUserbyId($_SESSION['user_id']);

            // $details = $userDetails[0];
            // var_dump($details);
            return $userDetails[0];
        }
    }
}
?>
