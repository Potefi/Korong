<?php


namespace app\model;


use db\Database;

class Product
{
    private $id;
    private $format;
    private $condition;
    private $price;
    private $albumId;
    private $releaseDate;

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
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     */
    public function setFormat($format): void
    {
        $this->format = $format;
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
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * @param mixed $releaseDate
     */
    public function setReleaseDate($releaseDate): void
    {
        $this->releaseDate = $releaseDate;
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
        $sql = "SELECT * FROM `product` GROUP BY format";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function findAllFormatsOfProduct($albumId){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` WHERE albumId = :albumId GROUP BY format";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "albumId" => $albumId
        ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
}