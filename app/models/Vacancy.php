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
        $stmt = self::pdo()->prepare("INSERT INTO vacancies (employer_id, name, category_id, salary, work_graph, description, created_at)
            VALUES (:employer_id, :name, :category_id, :salary, :work_graph, :description, :created_at)");
            $stmt->execute(
                [
                    'employer_id' => $_SESSION['user']->id,
                    'name' => $vacancy->name,
                    'category_id' => $vacancy->category_id,
                    'salary' => $vacancy->salary,
                    'work_graph' => $vacancy->work_graph,
                    'description' => $vacancy->description,
                    'created_at' => date('Y-m-d', strtotime($vacancy->created_at)),
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
    public static function getVacanciesLimit($data){
        $stmt = self::pdo()->prepare("SELECT vacancies.*, employers.name_organization FROM vacancies INNER JOIN employers ON vacancies.employer_id = employers.id WHERE vacancies.name LIKE :like_word AND vacancies.work_graph IN (".self::createParams($data->graphs).") ORDER BY vacancies.created_at ".$data->sortDate." LIMIT 10 OFFSET :number_page");
        $stmt->bindValue(':number_page', $data->number_page, self::pdo()::PARAM_INT);
        $stmt->bindValue(':like_word', $data->like_word, self::pdo()::PARAM_STR);

        foreach ($data->graphs as $graph){
            $stmt->bindValue(":graph_". $graph, $graph, self::pdo()::PARAM_STR);
        }
        $stmt->execute();
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function createParams($array){
        $params = [];
        $str = '';
        foreach($array as $graph){
            array_push($params, ":graph_" . $graph);
        }
        $str = implode(',', $params);
        return $str;
    }
    public static function getVacanciesEmployer($employer_id){
        $stmt = self::pdo()->prepare('SELECT * FROM vacancies WHERE employer_id = :employer_id');
        $stmt->execute(['employer_id' => $employer_id]);
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getVacancy($vacancy_id){
        $stmt = self::pdo()->prepare('SELECT vacancies.*, categories.name AS category_name, graph.name AS graph_name, employers.name_organization AS name_organization FROM vacancies INNER JOIN categories ON vacancies.category_id = categories.id INNER JOIN graph ON vacancies.work_graph = graph.id INNER JOIN employers ON vacancies.employer_id = employers.id WHERE vacancies.id = :vacancy_id');
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

    public static function getVacanciesStudent($student_id){
        $stmt = self::pdo()->prepare('SELECT vacancies.*, responses.*, status.id AS status_id, status.name AS status_name, employers.name_organization AS name_organization FROM resume INNER JOIN responses ON resume.id = responses.resume_id INNER JOIN vacancies ON responses.vacancy_id = vacancies.id INNER JOIN status ON responses.status = status.id INNER JOIN employers ON vacancies.employer_id = employers.id WHERE user_id = :user_id');
        $stmt->execute(['user_id' => $student_id]);
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    public static function getCountVacancies(){
        $stmt = self::pdo()->query('SELECT count(*) AS count_vacancies FROM vacancies');
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function uploadImage($vacancy_id, $filename){
        $stmt = self::pdo()->prepare('UPDATE vacancies SET photo = :filename WHERE id = :vacancy_id');
        $stmt->execute(
            [
                'vacancy_id' => $vacancy_id,
                'filename' => $filename,
            ]
        );
    }
    public static function getMaxVacancyId(){
        $stmt = self::pdo()->query('SELECT MAX(id) AS max_id FROM vacancies');
        $vacancy_id = $stmt->fetch()->max_id;
        return $vacancy_id;
    }
}