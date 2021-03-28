<?php


namespace app\model;


use db\Database;

class Artist
{
    private $id;
    private $name;

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
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    public static function FindAll()
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `artist`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
    public static function findOneById($id)
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `artist` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchObject(self::class);
    }
    public static function newArtist($name)
    {
        foreach (Artist::FindAll() as $artist){
            if ($artist->getName() == $name){
                return false;
            }
        }
        $pdo = Database::getPdo();
        $sql = "INSERT INTO artist (`name`) VALUES (:name);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name
        ]);
        if ($stmt){
            return true;
        }
        return false;
    }
    public static function deleteArtist($id)
    {
        $pdo = Database::getPdo();
        $sql = "DELETE FROM `artist` WHERE `id` = :id;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }
    public static function updateArtist($id, $name)
    {
        $pdo = Database::getPdo();
        $sql = "UPDATE `artist` SET `name` = :name WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name
        ]);
        if ($stmt){
            return true;
        }
        return false;
    }
}