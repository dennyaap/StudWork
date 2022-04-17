<?php
namespace App\models;
use App\services\Connection;
use App\services\Utils;

session_start();

class Employer
{
    public static function pdo($config = CONFIG_CONNECTION)
    {
        return Connection::make($config);
    }
    public static function isAuthorizated(){
        return $_SESSION['isAuth'] ?? false;
    }
    public static function searchEmployer($employer){
        $find = false;
        $stmt = self::pdo()->prepare("SELECT email FROM users 
        WHERE email = :email");
        $stmt-> execute([
            'email' => $employer->email,
            ]);
        $data = $stmt->fetch();
        if(empty($data)){
            self::createEmployerAccount($employer);
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public static function authEmployer($employer){
        $find = false;
        $stmt = self::pdo()->prepare("SELECT * FROM employers 
        WHERE email = :email AND password = :password");
        $stmt-> execute([
            'email' => $employer->email,
            'password' => $employer->password
            ]);
        $data = $stmt->fetch();
        
        if($data){
            $_SESSION['isAuth'] = true;
            Utils::setUser($data);
            $find = true;
        }
        echo json_encode($find, JSON_UNESCAPED_UNICODE);
        // if(!empty($data)){
        //     $hash = $data->password;
        //     $verifyPassword = password_verify($password, $hash);
        // }
        // return $verifyPassword;
    }
    public static function createEmployerAccount($employer){
        $stmt = self::pdo()->prepare("INSERT employers(name, surname, patronomyc, email, password, gender)
        VALUES(:name, :surname, :patronomyc, :email, :password, :gender)");
        $stmt-> execute([
            'name' => $employer->name,
            'surname' => $employer->surname,
            'patronomyc' => $employer->patronomyc,
            'email' => $employer->email,
            'password' => $employer->password,
            'gender' => $employer->gender
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