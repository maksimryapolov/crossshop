<?php

class Db
{
    public static function connect()
    {
        $param = ROOT . "/application/config/db_param.php";
        $param = include($param);

        $dsn = "mysql:dbname={$param['dbName']};host={$param['host']};charset={$param['charset']}";
        $opt = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $db = new PDO($dsn, $param["login"], $param["pass"], $opt);

        return $db;
    }
}
