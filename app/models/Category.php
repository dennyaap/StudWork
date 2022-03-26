<?php

namespace App\models;
use App\services\Connection;

class Category
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function showCategories()
    {
        $stmt = self::pdo()->query('SELECT * FROM categories');
        return $stmt->fetchAll();
    }
    public static function showCategory($id)
    {
        $stmt = self::pdo()->prepare('SELECT vacancies.*, categories.name as category FROM vacancies
        INNER JOIN categories ON vacancies.category_id = categories.id
        WHERE vacancies.category_id = :id');

        $stmt->execute(
            ['id' => $id]
        );
        return $stmt->fetchAll();
    }
}