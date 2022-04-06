<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\services\Utils;

$stream = file_get_contents("php://input");

if($stream != null){
    $data = json_decode($stream)->data;
    Utils::checkUser($data);
}