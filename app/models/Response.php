<?php

namespace App\models;
use App\services\Connection;

class Response
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function getResponses($vacancy_id)
    {
        $stmt = self::pdo()->prepare('SELECT responses.*, users.full_name, status.id AS status_id, status.name AS status_name FROM responses INNER JOIN resume ON responses.resume_id = resume.id INNER JOIN users ON resume.user_id = users.id INNER JOIN status ON responses.status = status.id WHERE vacancy_id = :vacancy_id');
        $stmt->execute(
            [
                'vacancy_id' => $vacancy_id
            ]
        );
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function sendResponse($response){
        $stmt = self::pdo()->prepare('UPDATE responses SET message = :message, status = :status WHERE responses.resume_id = :resume_id');
        $stmt->execute(
            [
                'message' => $response->message,
                'status' => $response->status,
                'resume_id' => $response->resume_id
            ]
        );
        $res = 'OK';
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getResponse($vacancy_id){
        $stmt = self::pdo()->prepare('SELECT * FROM responses
        WHERE vacancy_id = :vacancy_id');
        $stmt->execute(
            [
                'vacancy_id' => $vacancy_id
            ]
        );
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}