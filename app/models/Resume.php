<?php
namespace App\models;
use App\services\Connection;
use App\services\Utils;

session_start();

class Resume
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function createResume($resume){
        $stmt = self::pdo()->prepare("INSERT INTO resume (user_id, phone, about, photo, created_at)
            VALUES (:user_id, :phone, :about, :photo, :created_at)");
            $stmt->execute(
                [
                    'user_id' => $_SESSION['user']->id,
                    'phone' => $resume->phone,
                    'about' => $resume->about,
                    'photo' => $resume->photo,
                    'created_at' => date('Y-m-d', strtotime($resume->created_at))
                    
                ]
            );
            $res = 'OK';
            echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getResumeStudent($student_id){
        $stmt = self::pdo()->prepare('SELECT * FROM resume WHERE user_id = :user_id');
        $stmt->execute(['user_id' => $student_id]);
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function editResume($resume){
        $stmt = self::pdo()->prepare('UPDATE resume SET phone = :phone, about = :about WHERE id = :resume_id');
        $stmt->execute(
            [
                'resume_id' => $resume->resume_id,
                'phone' => $resume->phone,
                'about' => $resume->about
            ]
        );
        $res = 'OK';
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function getResume($resume_id){
        $stmt = self::pdo()->prepare('SELECT resume.*, users.full_name FROM resume INNER JOIN users ON resume.user_id = users.id WHERE resume.id = :resume_id');
        $stmt->execute(['resume_id' => $resume_id]);
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function sendResume($data){
        $stmt = self::pdo()->prepare("INSERT INTO responses (resume_id, vacancy_id, status)
            VALUES (:resume_id, :vacancy_id, :status)");
            $stmt->execute(
                [
                    'resume_id' => $data->resume_id,
                    'vacancy_id' => $data->vacancy_id,
                    'status' => $data->status
                ]
            );
            $res = 'OK';
            echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
    public static function checkResume($vacancy_id){
        $find = false;
        $stmt = self::pdo()->prepare('SELECT responses.vacancy_id FROM responses WHERE vacancy_id = :vacancy_id');
        $stmt->execute(['vacancy_id' => $vacancy_id]);
        $res = $stmt->fetch();
        if(!empty($res)){
            $find = true;
        }
        echo json_encode($find, JSON_UNESCAPED_UNICODE);
    }
}