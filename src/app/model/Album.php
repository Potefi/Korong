<?php


namespace app\model;


use db\Database;

class Album
{
    private $id;
    private $artistId;
    private $title;
    private $category;
    private $cover;

    /**
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getArtistId()
    {
        return $this->artistId;
    }
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @return mixed
     */
    public function getCover()
    {
        return $this->cover;
    }
    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return Album[]
     */
    public static function FindAll()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `album`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function FindFiftyOldest()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `album` ORDER BY `id` ASC LIMIT 50";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function FindLastThree()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `album` ORDER BY `id` DESC LIMIT 3";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function findAllCategories(){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `album` GROUP BY category";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function findOneById($id){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `album` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchObject(self::class);
    }
}