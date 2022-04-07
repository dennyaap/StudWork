<?php
namespace App\models;
use App\services\Connection;

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
    public static function checkStudent($user){
        $isAuth = False;
        $stmt = self::pdo()->prepare("SELECT email, password FROM users 
        WHERE email = :email AND password = :password");
        $stmt-> execute([
            'email' => $user->email,
            'password' => $user->password
            ]);
        $data = $stmt->fetch();
        
        if(!empty($data)){
            $isAuth = True;
        }
        echo json_encode($isAuth, JSON_UNESCAPED_UNICODE);
        // if(!empty($data)){
        //     $hash = $data->password;
        //     $verifyPassword = password_verify($password, $hash);
        // }
        // return $verifyPassword;
    }
    public static function getUser($email){
        $stmt = self::pdo()->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute([
            'email' => $email
        ]);
        $res = $stmt->fetch();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}