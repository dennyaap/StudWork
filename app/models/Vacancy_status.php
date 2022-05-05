<?php

namespace App\models;
use App\services\Connection;

class Vacancy_status
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function getStatuses()
    {
        $stmt = self::pdo()->query('SELECT * FROM vacancy_status');
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function changeVacancyStatus($data){
        $stmt = self::pdo()->prepare('UPDATE vacancies
        SET status_id = :status_id
        WHERE id = :vacancy_id');

        $stmt->execute(
            [
                'vacancy_id' => $data->vacancy_id,
                'status_id' => $data->status_id,
            ]
        );
        $res = 'OK';
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}