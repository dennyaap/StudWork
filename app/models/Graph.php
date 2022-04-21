<?php

namespace App\models;
use App\services\Connection;

class Graph
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function getGraphs()
    {
        $stmt = self::pdo()->query('SELECT * FROM graph');
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}