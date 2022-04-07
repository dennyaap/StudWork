<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

session_start();

$stream = file_get_contents("php://input");

if($stream != null){
    $data = json_decode($stream)->data;
    $_SESSION['isAuth'] = True;
    Utils::setUser($data);
}