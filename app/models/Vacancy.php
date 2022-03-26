<?php

namespace App\models;
use App\services\Connection;

class Vacancy
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function showVacancies()
    {
        $stmt = self::pdo()->query('SELECT * FROM vacancies');
        return $stmt->fetchAll();
    }
}