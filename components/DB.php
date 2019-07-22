<?php

class DB
{
    public static function getConnect()
    {
        $params = include 'config/DBConnectionParameters.php';
        $dsn = "mysql:host=$params[host];dbname=$params[dbname]";
        $db = new PDO($dsn, $params['username'], $params['password']);
        $db->exec('SET NAMES UTF8');
        
        return $db;
    }
}