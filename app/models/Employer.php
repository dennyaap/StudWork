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
        } else {
            $find = true;
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    public static function authEmployer($employer){
        $find = false;
        $stmt = self::pdo()->prepare("SELECT * FROM employers 
        WHERE email = :email");
        $stmt-> execute([
            'email' => $employer->email
            ]);
        $data = $stmt->fetch();
        
        if($data){
            if(password_verify($employer->password, $data->password)){
                $_SESSION['isAuth'] = true;
                Utils::setUser($data);
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
    public static function createEmployerAccount($employer){
        $stmt = self::pdo()->prepare("INSERT employers(name, surname, patronomyc, name_organization, phone, email, password, gender)
        VALUES(:name, :surname, :patronomyc, :name_organization, :phone, :email, :password, :gender)");
        $stmt-> execute([
            'name' => $employer->name,
            'surname' => $employer->surname,
            'patronomyc' => $employer->patronomyc,
            'name_organization' => $employer->nameOrganization,
            'phone' => $employer->phone,
            'email' => $employer->email,
            'password' => password_hash($employer->password, PASSWORD_BCRYPT),
            'gender' => $employer->gender
            ]);
    }
}