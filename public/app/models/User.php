<?php
class User {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Cria um novo usuário
    public function create($username, $hashedPassword, $lastName, $address, $city, $uf, $telefone, $email) {
        $stmt = $this->pdo->prepare('INSERT INTO usuarios (username, password, lastName, address, city, uf, telefone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$username, $hashedPassword, $lastName, $address, $city, $uf, $telefone, $email]);
    }
    
    // Encontra um usuário pelo nome de usuário
    public function findByUsername($username) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE username = ?');
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Encontra um usuário pelo ID
    public function findById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE id = ?');
        $stmt->execute([$id]);
        $userDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $userDetails;
    }
}
?>
