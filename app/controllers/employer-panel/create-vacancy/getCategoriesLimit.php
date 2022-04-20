<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Category;

$stream = file_get_contents("php://input");

if($stream != null){
    $countRow = json_decode($stream)->data;
    Category::getCategoriesLimit($countRow);
}