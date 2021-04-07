<?php


namespace app\model;


use db\Database;
use function app\controller\endsWith;

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
    public static function findAll()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT DISTINCT album.id AS 'id', artistId, title, category, cover, releaseDate FROM album JOIN product ON album.id = product.albumId;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function findFiftyOldest()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT DISTINCT album.id AS 'id', artistId, title, category, cover, releaseDate FROM album JOIN product ON album.id = product.albumId ORDER BY album.id ASC LIMIT 50;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function findLastThree()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT DISTINCT album.id AS 'id', artistId, title, category, cover, releaseDate FROM album JOIN product ON album.id = product.albumId ORDER BY album.id DESC LIMIT 3;";
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
    public static function updateAlbum($album, $cover)
    {
        $pdo = Database::getPdo();
        $sql = "UPDATE `album` SET `artistId` = :artistId, `title` = :title, `category` = :category, `releaseDate` = :releaseDate, `cover` = :cover WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $album['id'],
            ':artistId' => $album['artistId'],
            ':title' => $album['title'],
            ':category' => $album['category'],
            ':releaseDate' => $album['releaseDate'],
            ':cover' => self::checkCover($cover)
        ]);
        if ($stmt){
            return true;
        }
        return false;
    }
    public static function updateAlbumWithoutCover($album)
    {
        $pdo = Database::getPdo();
        $sql = "UPDATE `album` SET `artistId` = :artistId, `title` = :title, `category` = :category, `releaseDate` = :releaseDate WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $album['id'],
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
    public static function deleteAlbum($id)
    {
        $pdo = Database::getPdo();
        $sql = "DELETE FROM `album` WHERE `id` = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }
    public static function newAlbum($album, $files)
    {
        $pdo = Database::getPdo();
        $sql = "INSERT INTO album (artistId, title, category, cover, releaseDate) VALUES (:artistId, :title, :category, :cover, :releaseDate);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':artistId' => $album['artistId'],
            ':title' => $album['title'],
            ':category' => $album['category'],
            ':cover' => self::checkCover($files),
            ':releaseDate' => $album['releaseDate'],
        ]);
        if ($stmt){
            return true;
        }
        return false;
    }

    public static function checkCover($files){
        if (isset($files['cover']) && !empty($files['cover']['name'])){
            $folder = 'img/albumCovers';
            $fname = $_FILES['cover']['name'];
            if ((endsWith($fname, ".jpg") || endsWith($fname, ".png")) && $_FILES['cover']['error'] == UPLOAD_ERR_OK) {
                $from = $_FILES['cover']['tmp_name'];
                $to = "$folder/$fname";
                $upload = move_uploaded_file($from, $to);
                if ($upload) {
                    return $fname;
                }
            }
        }
        return NULL;
    }
}