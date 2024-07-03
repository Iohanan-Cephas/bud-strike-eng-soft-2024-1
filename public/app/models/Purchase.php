<?php
require_once dirname(__DIR__) . '/config/config.php';


class Purchase {
    private $pdo;


    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insertAllCart($user_id) {
        try {
            // Inicia uma transação para garantir atomicidade das operações
            $this->pdo->beginTransaction();
    
            // Insere as compras do carrinho na tabela purchases
            $stmt = $this->pdo->prepare("INSERT INTO purchases (user_id, product_id, purchase_date, quantity, price_paid)
                SELECT 
                    c.user_id,
                    c.product_id,
                    NOW() as purchase_date,
                    c.quantity,
                    p.preco * c.quantity as price_paid
                FROM carrinho c
                JOIN produtos p ON c.product_id = p.id
                WHERE c.user_id = :user_id
            ");
    
            $stmt->execute([
                ':user_id' => $user_id,
            ]);
    
            // Atualiza a quantidade de produtos na tabela produtos
            $updateStmt = $this->pdo->prepare("
                UPDATE produtos p
                JOIN carrinho c ON p.id = c.product_id
                SET p.quantidade = p.quantidade - c.quantity
                WHERE c.user_id = :user_id
            ");
    
            $updateStmt->execute([
                ':user_id' => $user_id,
            ]);
    
            // Commit da transação
            $this->pdo->commit();
    
            return true;
        } catch (PDOException $e) {
            // Rollback em caso de erro
            $this->pdo->rollBack();
            error_log('Erro ao inserir compras do carrinho: ' . $e->getMessage());
            return false;
        }
    }
    

    public function insertOne($user_id, $product_id, $quantity) {
        try {
            // Inserção na tabela de compras
            $stmt = $this->pdo->prepare("INSERT INTO purchases (user_id, product_id, purchase_date, quantity, price_paid)
                SELECT 
                    :user_id as user_id,
                    :product_id as product_id,
                    NOW() as purchase_date,
                    :quantity as quantity,
                    p.preco * :quantity as price_paid
                FROM produtos p
                WHERE p.id = :product_id
            ");
    
            $stmt->execute([
                ':user_id' => $user_id,
                ':product_id' => $product_id,
                ':quantity' => $quantity,
            ]);
    
            // Atualização da quantidade de produtos
            $stmt = $this->pdo->prepare("UPDATE produtos SET quantidade = quantidade - :quantity WHERE id = :product_id");
            $stmt->execute([
                ':product_id' => $product_id,
                ':quantity' => $quantity,
            ]);
    
            return true;
        } catch (PDOException $e) {
            error_log('Erro ao inserir compra de um produto: ' . $e->getMessage());
            return false;
        }
    }
    

    public function findByUserId($user_id) {
    try {
        // Prepara a consulta SQL
        $stmt = $this->pdo->prepare("SELECT * FROM purchases WHERE user_id = :user_id");

        $stmt->execute([
            ':user_id' => $user_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log('Erro ao buscar compras do usuário: ' . $e->getMessage());
        return []; 
    }
    }
    public function indexAll() {
        try {
            // Prepara a consulta SQL
            $stmt = $this->pdo->prepare("
                SELECT 
                    u.username AS user_name,
                    p.nome AS product_name,
                    pu.product_id,
                    pu.user_id,
                    pu.price_paid,
                    pu.quantity,
                    pu.purchase_date
                FROM purchases pu
                JOIN usuarios u ON pu.user_id = u.id
                JOIN produtos p ON pu.product_id = p.id
            ");

            // Executa a consulta
            $stmt->execute();

            // Retorna os resultados
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Erro ao buscar todas as compras: ' . $e->getMessage());
            return [];
        }
    }
}
?>
