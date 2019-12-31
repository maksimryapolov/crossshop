<?php

class Db
{
    public static function connect()
    {
        $nameDB = "shop_manager";
        $login = "root";

        try {
            $db = new PDO("mysql:dbname=$nameDB;host=localhost", $login, '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $db;
    }
}