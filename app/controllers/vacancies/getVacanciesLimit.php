<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Vacancy;

$stream = file_get_contents("php://input");

if($stream != null){
    $data = json_decode($stream)->data;
    Vacancy::getVacanciesLimit($data);
}