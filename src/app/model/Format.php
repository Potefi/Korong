<?php


namespace app\model;


use db\Database;

class Format
{
    private $id;
    private $format;

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

    public static function findOneById($id){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `format` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchObject(self::class);
    }

    public static function findOneByFormat($format){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `format` WHERE `format` = :format";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':format' => $format
        ]);
        return $stmt->fetchObject(self::class);
    }
}