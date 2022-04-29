<?php

namespace App\models;
use App\services\Connection;

class Status
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function getStatuses()
    {
        $stmt = self::pdo()->query('SELECT * FROM status');
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}