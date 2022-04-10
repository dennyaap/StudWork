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
    public static function checkStudent($user){
        $stmt = self::pdo()->prepare("SELECT * FROM users 
        WHERE email = :email AND password = :password");
        $stmt-> execute([
            'email' => $user->email,
            'password' => $user->password
            ]);
        $data = $stmt->fetch();
        
        if($data){
            $_SESSION['isAuth'] = true;
            Utils::setUser($data);
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        // if(!empty($data)){
        //     $hash = $data->password;
        //     $verifyPassword = password_verify($password, $hash);
        // }
        // return $verifyPassword;
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