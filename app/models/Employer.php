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
        $stmt = self::pdo()->prepare("SELECT email FROM employers
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
    public static function getUser($email){
        $stmt = self::pdo()->prepare("SELECT id, full_name, name_organization FROM employers 
        WHERE email = :email");
        $stmt->execute(
            [
                'email' => $email,
            ]
        );
        return $stmt->fetch();
    }
    public static function authEmployer($employer){
        $find = false;
        $stmt = self::pdo()->prepare("SELECT password FROM employers 
        WHERE email = :email");
        $stmt-> execute([
            'email' => $employer->email
            ]);
        $data = $stmt->fetch();
        
        if($data){
            if(password_verify($employer->password, $data->password)){
                $_SESSION['isAuth'] = true;
                $role = 'employer';
                $user_data = self::getUser($employer->email);
                Utils::setUser($user_data, $role);
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
        $stmt = self::pdo()->prepare("INSERT employers(full_name, name_organization, phone, email, password, gender)
        VALUES(:full_name, :name_organization, :phone, :email, :password, :gender)");
        $stmt-> execute([
            'full_name' => $employer->full_name,
            'name_organization' => $employer->name_organization,
            'phone' => $employer->phone,
            'email' => $employer->email,
            'password' => password_hash($employer->password, PASSWORD_BCRYPT),
            'gender' => $employer->gender
            ]);
    }
    public static function getEmployers(){
        $stmt = self::pdo()->query('SELECT * FROM employers');
        $res = $stmt->fetchAll();
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }
}