<?php

namespace App\models;
use App\services\Connection;

class Skill
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function getSkills()
    {
        $stmt = self::pdo()->query('SELECT * FROM skills');
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

    public static function createSkill($name){
        $stmt = self::pdo()->prepare("INSERT INTO skills (name)
        VALUES (:name)");
        $stmt->execute(
            [
                'name' => $name,
            ]
        );
    }
    public static function checkSkill($name){
        $stmt = self::pdo()->prepare('SELECT name
        FROM skills
        WHERE name = :name');
        $stmt->execute(
            [
                'name' => $name
            ]
        );
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getSkill($id){
        $stmt = self::pdo()->prepare('SELECT * FROM skills
        WHERE id = :id');
        $stmt->execute(
            [
                'id' => $id
            ]
        );
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function editSkill($data){
        $stmt = self::pdo()->prepare('UPDATE skills
        SET name = :name
        WHERE id = :id');

        $stmt->execute(
            [
                'id' => $data->id,
                'name' => $data->name,
            ]
        );
    }
    public static function deleteSkill($id){
        $stmt = self::pdo()->prepare('DELETE FROM skills
        WHERE id = :id');

        $stmt->execute(
            [
                'id' => $id,
            ]
        );
    }
}