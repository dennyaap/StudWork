<?php
namespace App\models;
use App\services\Connection;
use App\services\Utils;

session_start();

class Student
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function isAuthorizated(){
        return $_SESSION['isAuth'] ?? false;
    }
    public static function searchStudent($student){
        $find = false;
        $stmt = self::pdo()->prepare("SELECT email FROM users 
        WHERE email = :email");
        $stmt-> execute([
            'email' => $student->email,
            ]);
        $data = $stmt->fetch();
        if(empty($data)){
            self::createStudentAccount($student);
        } else{
            $find = true;
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public static function authStudent($user){
        $find = false;
        $stmt = self::pdo()->prepare("SELECT * FROM users 
        WHERE email = :email");
        $stmt-> execute([
            'email' => $user->email
            ]);
        $data = $stmt->fetch();
        
        if($data){
           if(password_verify($user->password, $data->password)){
                $_SESSION['isAuth'] = true;
                $role = 'student';
                Utils::setUser(['full_name' => $data->full_name], $role);
                $find = true;
           }
        }
        echo json_encode($find, JSON_UNESCAPED_UNICODE);
        // if(!empty($data)){
        //     $hash = $data->password;
        //     $verifyPassword = password_verify($password, $hash);
        // }
        // return $verifyPassword;
    }
    public static function createStudentAccount($student){
        $stmt = self::pdo()->prepare("INSERT users(full_name, email, password, gender)
        VALUES(:full_name, :email, :password, :gender)");
        $stmt-> execute([
            'full_name' => $student->full_name,
            'email' => $student->email,
            'password' => password_hash($student->password, PASSWORD_BCRYPT),
            'gender' => $student->gender
            ]);
    }
    // public static function getUser($email){
    //     $stmt = self::pdo()->prepare('SELECT * FROM users WHERE email = :email');
    //     $stmt->execute([
    //         'email' => $email
    //     ]);
    //     $res = $stmt->fetch();

    //     return $res;
    // }
}