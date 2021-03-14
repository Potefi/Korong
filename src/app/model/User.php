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

    private $errors = [];

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

    public function validate($username, $email, $password)
    {
        $this->errors = [];

        if(!preg_match("/^[A-zÖÜÓŐÚÉÁŰÍöüóőúéáűí]+[\d\wÖÜÓŐÚÉÁŰÍöüóőúéáűí]*$/",$username))
        {
            $this->errors['username'] = 'A felhasználóneve csak betűket és számokat tartalmazhat! Az első karakter nem lehet szám!';
        }
        if(!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/",$email))
        {
            $this->errors['email'] = 'Az email nem megfelelő formátumú!';
        }
        if(!preg_match("/^[\d\wÖÜÓŐÚÉÁŰÍöüóőúéáűí]{8,}$/",$password))
        {
            $this->errors['password'] = 'A jelszónak legalább 8 karakterből kell állnia! Különleges karaktereket nem tartalmazhat!';
        }
        return count($this->errors) == 0;
    }

    public function hasError($minek)
    {
        return array_key_exists($minek, $this->errors);
    }
    public function getError($minek)
    {
        return $this->errors[$minek];
    }
    public function getErrors()
    {
        return $this->errors;
    }

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

    public function registrateUser($username, $password, $email, $permission)
    {
        if ($this->validate($username, $email, $password)) {
            $pdo = Database::getPdo();
            $sql = "INSERT INTO `user` (username, password, email, permission) VALUES (:username, :password, :email, :permission)";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                ':username' => $username,
                ':password' => password_hash($password, PASSWORD_DEFAULT),
                ':email' => $email,
                ':permission' => $permission
            ]);
            if ($stmt) {
                $this->id = $pdo->lastInsertId();
            }
            if(false === $result){
                $this->errors['adatbazis'] = 'Sikertelen mentés';
                return false;
            }
            return true;
        }
        return false;
    }
}