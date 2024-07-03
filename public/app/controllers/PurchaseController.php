<?php
require_once(__DIR__ . '/../models/Purchase.php');


class PurchaseController {
      private $pdo;

      public function __construct(PDO $pdo) {
          $this->pdo = $pdo;
      }

      public function insertAllCart($user_id){
        $purchaseModel = new Purchase($this->pdo);
        return $purchaseModel->insertAllCart($user_id);
      }

      public function insertOne($user_id, $product_id, $quantity){
        $purchaseModel = new Purchase($this->pdo);
        return $purchaseModel->insertOne($user_id, $product_id, $quantity);
      }

      public function index($user_id) {
        $purchaseModel = new Purchase($this->pdo);
        return $purchaseModel->findByUserId($user_id);
      }

      public function indexAll() {
        $purchaseModel = new Purchase($this->pdo);
        return $purchaseModel->indexAll();
      }
}
?>
