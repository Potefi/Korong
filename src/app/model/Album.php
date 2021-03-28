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
    private $releaseDate;


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
    public static function updateAlbumWithCover($id, $album, $cover)
    {
        $pdo = Database::getPdo();
        $sql = "UPDATE `album` SET `artistId` = :artistId, `title` = :title, `category` = :category, `releaseDate` = :releaseDate, `cover` = :cover WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':artistId' => $album['artistId'],
            ':title' => $album['title'],
            ':category' => $album['category'],
            ':releaseDate' => $album['releaseDate'],
            ':cover' => $cover
        ]);
        if ($stmt){
            return true;
        }
        return false;
    }
    public static function updateAlbumWithoutCover($id, $album)
    {
        $pdo = Database::getPdo();
        $sql = "UPDATE `album` SET `artistId` = :artistId, `title` = :title, `category` = :category, `releaseDate` = :releaseDate WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':artistId' => $album['artistId'],
            ':title' => $album['title'],
            ':category' => $album['category'],
            ':releaseDate' => $album['releaseDate']
        ]);
        if ($stmt){
            return true;
        }
        return false;
    }
    public function getArtist(){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `artist` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $this->artistId
        ]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    public function getCategoryName(){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `category` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $this->category
        ]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    public function findLowestPrice()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `product` WHERE `albumId` = :albumId ORDER BY price ASC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':albumId' => $this->id
        ]);
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
}