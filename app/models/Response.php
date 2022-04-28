<?php

namespace App\models;
use App\services\Connection;

class Response
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function getResponses($vacancy_id)
    {
        $stmt = self::pdo()->prepare('SELECT * FROM responses WHERE vacancy_id = :vacancy_id');
        $stmt->execute(
            [
                'vacancy_id' => $vacancy_id
            ]
        );
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}