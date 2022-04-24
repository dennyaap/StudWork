<?php

namespace App\models;
use App\services\Connection;
use PDO;

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
    public static function addVacancy($vacancy){
        $stmt = self::pdo()->prepare("INSERT INTO vacancies (employer_id, name, category_id, salary, work_graph)
            VALUES (:employer_id, :name, :category_id, :salary, :work_graph)");
            $stmt->execute(
                [
                    'employer_id' => 4,
                    'name' => $vacancy->name,
                    'category_id' => $vacancy->category_id,
                    'salary' => $vacancy->salary,
                    'work_graph' => $vacancy->work_graph,
                ]
            );
            $res = '123';
            echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}