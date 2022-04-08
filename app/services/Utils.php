<?php
namespace App\services;

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/models/Student.php';
use App\models\Student;

session_start();

class Utils
{
    public static function isAutorisation(){
        return $_SESSION['isAuth'] ?? false;
    }
    public static function setUser($email){
        $_SESSION['user'] = Student::getStudent($email);
    }
}