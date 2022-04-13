<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Language;

$stream = file_get_contents("php://input");

if($stream != null){
    $data = json_decode($stream)->data;
    Language::getLanguage($data);
}