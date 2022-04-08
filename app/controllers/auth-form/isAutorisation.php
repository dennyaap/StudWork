<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\services\Utils;

session_start();

$stream = file_get_contents("php://input");

if($stream != null){
    $data = json_decode($stream)->data->email;
    $_SESSION['isAuth'] = true;
    Utils::setUser($data);
}