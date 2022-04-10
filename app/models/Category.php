<?php

namespace App\models;
use App\services\Connection;

class Category
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function getCategories()
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
        $stmt = self::pdo()->prepare("INSERT INTO categories (name, color)
        VALUES (:name, :color)");
        $stmt->execute(
            [
                'name' => $data->name,
                'color' => $data->color
            ]
        );
    }
    public static function checkCategory($name){
        $stmt = self::pdo()->prepare('SELECT name
        FROM categories
        WHERE name = :name');
        $stmt->execute(
            [
                'name' => $name
            ]
        );
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getCategory($id){
        $stmt = self::pdo()->prepare('SELECT * FROM categories
        WHERE id = :id');
        $stmt->execute(
            [
                'id' => $id
            ]
        );
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function editCategory($data){
        $stmt = self::pdo()->prepare('UPDATE categories
        SET name = :name, color = :color
        WHERE id = :id');

        $stmt->execute(
            [
                'id' => $data->id,
                'name' => $data->name,
                'color' => $data->color
            ]
        );
    }
    public static function deleteCategory($id){
        $stmt = self::pdo()->prepare('DELETE FROM categories
        WHERE id = :id');

        $stmt->execute(
            [
                'id' => $id,
            ]
        );
    }
}