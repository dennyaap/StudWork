<?php

namespace App\models;
use App\services\Connection;

class Language
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function getLanguages()
    {
        $stmt = self::pdo()->query('SELECT * FROM languages');
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    // public static function showSkill($id)
    // {
    //     $stmt = self::pdo()->prepare('SELECT vacancies.*, categories.name as category FROM vacancies
    //     INNER JOIN categories ON vacancies.category_id = categories.id
    //     WHERE vacancies.category_id = :id');

    //     $stmt->execute(
    //         ['id' => $id]
    //     );
    //     return $stmt->fetchAll();
    // }

    public static function createLanguage($name){
        $stmt = self::pdo()->prepare("INSERT INTO languages (name)
        VALUES (:name)");
        $stmt->execute(
            [
                'name' => $name,
            ]
        );
    }
    public static function checkLanguage($name){
        $stmt = self::pdo()->prepare('SELECT name
        FROM languages
        WHERE name = :name');
        $stmt->execute(
            [
                'name' => $name
            ]
        );
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getLanguage($id){
        $stmt = self::pdo()->prepare('SELECT * FROM languages
        WHERE id = :id');
        $stmt->execute(
            [
                'id' => $id
            ]
        );
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function editLanguage($data){
        $stmt = self::pdo()->prepare('UPDATE languages
        SET name = :name
        WHERE id = :id');

        $stmt->execute(
            [
                'id' => $data->id,
                'name' => $data->name,
            ]
        );
    }
    public static function deleteLanguage($id){
        $stmt = self::pdo()->prepare('DELETE FROM languages
        WHERE id = :id');

        $stmt->execute(
            [
                'id' => $id,
            ]
        );
    }
}