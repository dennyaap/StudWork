<?php
namespace App\services;
use App\services\Connection;
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