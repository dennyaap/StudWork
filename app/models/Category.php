<?php

namespace App\models;
use App\services\Connection;

class Category
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function getCategoriesJSON()
    {
        $stmt = self::pdo()->query('SELECT * FROM categories');
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
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

    public static function createCategory($data){
        $stmt = self::pdo()->prepare("INSERT INTO categories (name)
        VALUES (:name)");
        $stmt->execute(
            [
                'name' => $data,
            ]
        );

        return self::getCategoriesJSON();
    }
}