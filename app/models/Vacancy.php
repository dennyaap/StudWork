<?php

namespace App\models;
use App\services\Connection;
use PDO;
session_start();

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
        $stmt = self::pdo()->prepare("INSERT INTO vacancies (employer_id, name, category_id, salary, work_graph, description, created_at, name_organization)
            VALUES (:employer_id, :name, :category_id, :salary, :work_graph, :description, :created_at, :name_organization)");
            $stmt->execute(
                [
                    'employer_id' => $_SESSION['user']->id,
                    'name' => $vacancy->name,
                    'category_id' => $vacancy->category_id,
                    'salary' => $vacancy->salary,
                    'work_graph' => $vacancy->work_graph,
                    'description' => $vacancy->description,
                    'created_at' => $vacancy->created_at,
                    'name_organization' => $_SESSION['user']->name_organization
                ]
            );
            $res = 'OK';
            echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getVacancies(){
        $stmt = self::pdo()->query('SELECT vacancies.*, employers.name_organization FROM vacancies INNER JOIN employers ON vacancies.employer_id = employers.id');
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getVacanciesEmployer($employer_id){
        $stmt = self::pdo()->prepare('SELECT * FROM vacancies WHERE employer_id = :employer_id');
        $stmt->execute(['employer_id' => $employer_id]);
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getVacancy($vacancy_id){
        $stmt = self::pdo()->prepare('SELECT vacancies.*, categories.name AS category_name  FROM vacancies INNER JOIN categories ON vacancies.category_id = categories.id WHERE vacancies.id = :vacancy_id');
        $stmt->execute(['vacancy_id' => $vacancy_id]);
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function deleteVacancy($vacancy_id){
        $stmt = self::pdo()->prepare('DELETE FROM vacancies WHERE id = :vacancy_id');
        $stmt->execute(['vacancy_id' => $vacancy_id]);
        $res = 'OK';
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    public static function editVacancy($vacancy){
        $stmt = self::pdo()->prepare('UPDATE vacancies SET name = :name, category_id = :category_id, salary = :salary, description = :description, work_graph = :work_graph WHERE id = :vacancy_id');
        $stmt->execute(
            [
                'vacancy_id' => $vacancy->vacancy_id,
                'name' => $vacancy->name,
                'category_id' => $vacancy->category_id,
                'salary' => $vacancy->salary,
                'description' => $vacancy->description,
                'work_graph' => $vacancy->work_graph
            ]
        );
        $res = 'OK';
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }

}