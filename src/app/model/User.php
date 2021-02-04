<?php


namespace app\model;


use db\Database;


class User
{
    private $id;
    private $username;
    private $password;
    private $email;
    private $permission;

    // GETTERS & SETTERS

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
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }
    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }
    /**
     * @return mixed
     */
    public function getPermission()
    {
        return $this->permission;
    }
    /**
     * @param mixed $permission
     */
    public function setPermission($permission): void
    {
        $this->permission = $permission;
    }

    // FUNCTIONS

    public static function findOneById($id)
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `user` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchObject(self::class);
    }

    public static function findOneByUsername($username)
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `user` WHERE `username` = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username
        ]);
        return $stmt->fetchObject(self::class);
    }

    public static function findOneByEmail($email)
    {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `user` WHERE `email` = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->fetchObject(self::class);
    }

    public function doLogin($password): bool
    {
        if (password_verify($password, $this->password))
        {
            return true;
        }
        return false;
    }

    public static function registrateUser($username, $password, $email, $permission)
    {
        $pdo = Database::getPdo();
        $sql = "INSERT INTO `user` (username, password, email, permission) VALUES (:username, :password, :email, :permission)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':email' => $email,
            ':permission' => $permission
        ]);
    }
}