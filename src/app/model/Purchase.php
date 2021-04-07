<?php


namespace app\model;


use db\Database;

class Purchase
{
    private $id;
    private $userId;
    private $name;
    private $phone;
    private $postcode;
    private $city;
    private $address;
    private $email;
    private $takeover;
    private $status;



    private $loadable = ['userId', 'name', 'phone', 'postcode', 'city', 'address', 'email', 'takeover', 'dateOfOrder', 'status'];

    private $errors = [];

    public function load($data){
        foreach ($this->loadable as $item){
            if (array_key_exists($item, $data) && !empty($data[$item])){
                $this->$item = $data[$item];
            }
        }
    }

    public function insert(){
        if ($this->validate()) {
            $sql = 'INSERT INTO `orderdetails` (`userId`, `name`, `phone`, `postcode`, `city`, `address`, `email`, `takeover`, `dateOfOrder`, `status`) VALUES (:userId, :name, :phone, :postcode, :city, :address, :email, :takeover, NOW(), :status)';
            $pdo = Database::getPdo();
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute([
                ':userId' => isset($_SESSION['userId']) ? $_SESSION['userId'] : null,
                ':name' => $this->name,
                ':phone' => $this->phone,
                ':postcode' => $this->postcode,
                ':city' => $this->city,
                ':address' => $this->address,
                ':email' => $this->email,
                ':takeover' => $this->takeover,
                ':status' => 'Feldolgozás alatt'
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

    public function addItem($productId, $quantity){
        $sql = 'INSERT INTO `order` (`orderId`, `productId`, `quantity`) VALUES (:orderId, :productId, :quantity)';
        $pdo = Database::getPdo();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':orderId' => $this->id,
            ':productId' => $productId,
            ':quantity' => $quantity,
        ]);
    }

    public function validate()
    {
        $this->errors = [];

        if(!preg_match("/^[A-ZÖÜÓŐÚÉÁŰÍ]{1}[a-zöüóőúéáűí]{1,}(\s[A-ZÖÜÓŐÚÉÁŰÍ]{1}[a-zöüóőúéáűí]{1,}){1,}$/",$this->name))
        {
            $this->errors['name'] = 'A teljes nevét írja be!';
        }
        if(!preg_match("/^[1-9][0-9][0-9][0-9]$/",$this->postcode))
        {
            $this->errors['postcode'] = 'Az irányítószám nem megfelelő';
        }
        if(!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/",$this->email))
        {
            $this->errors['email'] = 'Az email nem megfelelő';
        }
        if(!preg_match("/^\+?[0-9]{9,12}$/",$this->phone))
        {
            $this->errors['phone'] = 'A telefonszám nem megfelelő';
        }
        if(!preg_match("/^[A-ZÖÜÓŐÚÉÁŰÍ]{1}[a-zöüóőúéáűí]{1,}$/",$this->city))
        {
            $this->errors['city'] = 'A város nem megfelelő';
        }
        return count($this->errors) == 0;
    }

    public static function findAllById($id){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `orderproduct` WHERE `id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public static function findAllByUserId($userId){
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `orderdetails` WHERE `userId` = :userId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':userId' => $userId
        ]);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function hasError($minek)
    {
        return array_key_exists($minek, $this->errors);
    }
    public function getError($minek)
    {
        return $this->errors[$minek];
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

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
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
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

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $postcode
     */
    public function setPostcode($postcode): void
    {
        $this->postcode = $postcode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getTakeover()
    {
        return $this->takeover;
    }

    /**
     * @param mixed $takeover
     */
    public function setTakeover($takeover): void
    {
        $this->takeover = $takeover;
    }

    /**
     * @return mixed
     */
    public function getDateOfOrder()
    {
        return $this->dateOfOrder;
    }

    /**
     * @param mixed $dateOfOrder
     */
    public function setDateOfOrder($dateOfOrder): void
    {
        $this->dateOfOrder = $dateOfOrder;
    }

    /**
     * @return string[]
     */
    public function getLoadable(): array
    {
        return $this->loadable;
    }

    /**
     * @param string[] $loadable
     */
    public function setLoadable(array $loadable): void
    {
        $this->loadable = $loadable;
    }
    private $dateOfOrder;
}