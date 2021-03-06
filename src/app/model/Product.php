<?php


namespace app\model;


use db\Database;

class Product
{
    private $id;
    private $formatId;
    private $condition;
    private $price;
    private $albumId;
    private $description;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFormatId()
    {
        return $this->formatId;
    }

    /**
     * @param mixed $formatId
     */
    public function setFormatId($formatId): void
    {
        $this->formatId = $formatId;
    }

    /**
     * @return mixed
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param mixed $condition
     */
    public function setCondition($condition): void
    {
        $this->condition = $condition;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAlbumId()
    {
        return $this->albumId;
    }

    /**
     * @param mixed $albumId
     */
    public function setAlbumId($albumId): void
    {
        $this->albumId = $albumId;
    }
    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public static function findOneById($id){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchObject(self::class);
    }
    public static function findOneByIdOrderedByPriceAsc($albumId)
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` WHERE `albumId` = :albumId ORDER BY price ASC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':albumId' => $albumId
        ]);
        return $stmt->fetchObject(self::class);
    }
    public static function findAllFormats(){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` GROUP BY formatId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function findAllFormatsOfProduct($albumId){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` WHERE albumId = :albumId GROUP BY formatId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "albumId" => $albumId
        ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function checkIfProductExists($id){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id
        ]);
        if (is_null($stmt->fetchAll(\PDO::FETCH_CLASS, self::class))){
            return false;
        }
        return true;
    }
    public static function findLowestPrice(){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` ORDER BY price ASC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchObject(self::class);
    }
    public static function findHighestPrice(){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` ORDER BY price DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchObject(self::class);
    }
    public static function findAllByAlbumId($id){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` WHERE `albumId` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
}