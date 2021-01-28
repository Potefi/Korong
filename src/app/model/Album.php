<?php


namespace app\model;


use db\Database;

class Album
{
    private $id;
    private $artist_id;
    private $name;
    private $img;

    /**
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
        return $this->artist_id;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
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
    public static function FindLastThree()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `album` ORDER BY `id` DESC LIMIT 3";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
}