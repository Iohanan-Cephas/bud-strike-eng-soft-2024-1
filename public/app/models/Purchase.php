<?php
require_once dirname(__DIR__) . '/config/config.php';


class Purchase {
    private $pdo;


    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insertAllCart($user_id) {
      
      try {
          // Prepara a consulta SQL com parâmetros
          $stmt = $this->pdo->prepare("
              INSERT INTO purchases (user_id, product_id, purchase_date, quantity, price_paid)
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
  
          // Executa a consulta passando os parâmetros diretamente em execute
          $stmt->execute([
              ':user_id' => $user_id
          ]);
  
          return true;
      } catch (PDOException $e) {
          error_log('Erro ao inserir compras do carrinho: ' . $e->getMessage());
          return false;
      }
  }

  public function insertOne($user_id, $product_id, $quantity) {
    try {
        $stmt = $this->pdo->prepare("
            INSERT INTO purchases (user_id, product_id, purchase_date, quantity, price_paid)
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

        return true;
    } catch (PDOException $e) {
        error_log('Erro ao inserir compra de um produto: ' . $e->getMessage());
        return false;
    }
}

  public function findByUserId($user_id) {
    try {
        // Prepara a consulta SQL
        $stmt = $this->pdo->prepare("
            SELECT *
            FROM purchases
            WHERE user_id = :user_id
            
        ");

        $stmt->execute([
            ':user_id' => $user_id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log('Erro ao buscar compras do usuário: ' . $e->getMessage());
        return []; 
    }
}
}

    

?>
