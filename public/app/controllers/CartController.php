<?php
require_once(__DIR__ . '/../models/Cart.php');


class CartController {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function insert($user_id, $product_id, $quantity) {
        $cartModel = new Cart($this->pdo);
        return $cartModel->insert($user_id, $product_id, $quantity);
    }

    public function index($user_id) {
      $cartModel = new Cart($this->pdo);
      return $cartModel->index($user_id);
  }

  public function delete($user_id, $product_id) {
    $cartModel = new Cart($this->pdo);
    return $cartModel->delete($user_id, $product_id);
}

public function getQuantityById($user_id) {
    $cartModel = new Cart($this->pdo);
    return $cartModel->quantityById($user_id);
}

function updateQuantity($user_id, $product_id, $change) {
    $cartModel = new Cart($this->pdo);
    return $cartModel->updateQuantity($user_id, $product_id, $change);
}
    
function getCartTotalValue($user_id, $product_id) {
    $cartModel = new Cart($this->pdo);
    return $cartModel->getCartTotalValue($user_id, $product_id);
}

}
?>
