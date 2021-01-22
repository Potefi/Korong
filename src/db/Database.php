<?php

namespace db;

class Database
{
    private static $pdo = null;

    public static function getPdo(){
        if (is_null(self::$pdo)){
            $conf = require("config.php");
            $db = $conf["db"];
            self::$pdo = new \PDO($db["dsn"], $db["user"], $db["password"]);
        }
        return self::$pdo;
    }
}