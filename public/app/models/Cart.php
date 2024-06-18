<?php
require_once dirname(__DIR__) . '/config/config.php';


class Cart {
    private $pdo;


    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert($user_id, $product_id, $quantity) {
        // Verificar se o produto já está no carrinho
        $stmt_check = $this->pdo->prepare('SELECT id, quantity FROM carrinho WHERE user_id = ? AND product_id = ?');
        $stmt_check->execute([$user_id, $product_id]);
        $row = $stmt_check->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            // Se o produto já estiver no carrinho, aumenta a quantidade
            $newQuantity = $row['quantity'] + $quantity;
            
            // Atualiza a quantidade do produto no carrinho
            $stmt_update = $this->pdo->prepare('UPDATE carrinho SET quantity = ? WHERE id = ?');
            $stmt_update->execute([$newQuantity, $row['id']]);
            
            return true; // Indica que a atualização foi bem-sucedida
        }
    
        // Se o produto não estiver no carrinho, proceder com a inserção
        $stmt_insert = $this->pdo->prepare('INSERT INTO carrinho (user_id, product_id, quantity) VALUES (?, ?, ?)');
        $success = $stmt_insert->execute([$user_id, $product_id, $quantity]);
    
        return $success;
    }

    public function index($user_id) {
        try {
            $this->pdo->beginTransaction();
    
            // Seleciona os detalhes dos produtos no carrinho para o user_id específico
            $stmt = $this->pdo->prepare("
                SELECT carrinho.product_id, carrinho.quantity, produtos.*
                FROM carrinho
                INNER JOIN produtos ON carrinho.product_id = produtos.id
                WHERE carrinho.user_id = ?
            ");
            $stmt->execute([$user_id]);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $this->pdo->commit();
            
            return $products;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            // Tratar exceção ou relatar erro
            throw new Exception("Erro ao acessar o banco de dados: " . $e->getMessage());
        }
    }

    public function delete($user_id, $product_id) {
        try {
            $this->pdo->beginTransaction();

            // Deleta o produto do carrinho
            $stmt_delete = $this->pdo->prepare('DELETE FROM carrinho WHERE user_id = ? AND product_id = ?');
            $stmt_delete->execute([$user_id, $product_id]);

            $this->pdo->commit();

            return true; // Indica que a deleção foi bem-sucedida
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            // Tratar exceção ou relatar erro
            throw new Exception("Erro ao acessar o banco de dados: " . $e->getMessage());
        }
    }
    function quantityById($user_id) {
        $stmt = $this->pdo->prepare('
            SELECT SUM(quantity) AS total_quantity
            FROM carrinho
            WHERE user_id = :user_id
        ');
    
        $stmt->execute(['user_id' => $user_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Retorna 0 se nenhum item for encontrado (evita comportamento inesperado)
        return isset($row['total_quantity']) ? $row['total_quantity'] : 0;
    }

    function updateQuantity($user_id, $product_id, $change) {
        // Atualizar a quantidade com base no valor de $change
        $stmt = $this->pdo->prepare('
            UPDATE carrinho
            SET quantity = quantity + :change, updated_at = CURRENT_TIMESTAMP
            WHERE user_id = :user_id AND product_id = :product_id
        ');
        
        $stmt->execute([
            'change' => $change,
            'user_id' => $user_id,
            'product_id' => $product_id,
        ]);
        
        // Verificar se alguma linha foi afetada
        if ($stmt->rowCount() > 0) {
            // Verificar a quantidade atual
            $stmt = $this->pdo->prepare('
                SELECT quantity
                FROM carrinho
                WHERE user_id = :user_id AND product_id = :product_id
            ');
            
            $stmt->execute([
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Se a quantidade for menor que 1, deletar o produto
            if ($result && $result['quantity'] < 1) {
                $stmt = $this->pdo->prepare('
                    DELETE FROM carrinho
                    WHERE user_id = :user_id AND product_id = :product_id
                ');
                
                $stmt->execute([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                ]);
            }
            
            return true;
        } else {
            return false;
        }
    }
    
    
}

?>
