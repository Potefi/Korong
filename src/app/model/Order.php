<?php


namespace app\model;


use db\Database;

class Order
{
    private $orderId;
    private $productId;
    private $quantity;

    public static function findAllByOrderId($orderId){
        $sql = 'SELECT * FROM `order` WHERE `orderId` = :orderId';
        $pdo = Database::getPdo();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':orderId' => $orderId
        ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public static function sumQuantityByOrderId($orderId){
        $sql = 'SELECT * FROM `order` WHERE `orderId` = :orderId';
        $pdo = Database::getPdo();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':orderId' => $orderId
        ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param mixed $orderId
     */
    public function setOrderId($orderId): void
    {
        $this->orderId = $orderId;
    }
}