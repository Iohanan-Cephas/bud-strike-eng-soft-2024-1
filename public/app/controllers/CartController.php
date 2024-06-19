<?php
require_once(__DIR__ . '/../models/Cart.php');


class CartController {
      private $pdo;

      protected function createCartModel() {
        return new Cart($this->pdo);
    }

      public function __construct(PDO $pdo) {
          $this->pdo = $pdo;
      }

      public function insert($user_id, $product_id, $quantity) {
          $cartModel = $this->createCartModel();
          return $cartModel->insert($user_id, $product_id, $quantity);
      }

      public function index($user_id) {
        $cartModel = $this->createCartModel();
        return $cartModel->index($user_id);
    }

    public function delete($user_id, $product_id) {
      $cartModel = $this->createCartModel();
      return $cartModel->delete($user_id, $product_id);
  }

  public function getQuantityById($user_id) {
      $cartModel = $this->createCartModel();
      return $cartModel->quantityById($user_id);
  }

  function updateQuantity($user_id, $product_id, $change) {
      $cartModel = $this->createCartModel();
      return $cartModel->updateQuantity($user_id, $product_id, $change);
  }
      
  function getCartTotalValue($user_id) {
      $cartModel = $this->createCartModel();
      return $cartModel->getCartTotalValue($user_id);
  }

  function cleanCart($user_id){
      $cartModel = $this->createCartModel();
      return $cartModel->cleanCart($user_id);
  }

}
?>
