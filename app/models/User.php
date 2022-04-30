<?php
namespace App\models;
use App\services\Connection;
use App\services\Utils;

session_start();

class User{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function isAuthorizated(){
        return $_SESSION['isAuth'] ?? false;
    }
    public static function checkAuth($user){
        $find = false;
        $stmt = self::pdo()->prepare("SELECT full_name, role FROM users 
        WHERE email = :email AND password = :password AND role = 'admin'");
        $stmt-> execute([
            'email' => $user->email,
            'password' => $user->password
            ]);
        $data = $stmt->fetch();
        
        if($data){
            $_SESSION['isAuth'] = true;
            Utils::setUser($data, $data->role);
            $find = true;
        }
        echo json_encode($find, JSON_UNESCAPED_UNICODE);
        // if(!empty($data)){
        //     $hash = $data->password;
        //     $verifyPassword = password_verify($password, $hash);
        // }
        // return $verifyPassword;
    }
}