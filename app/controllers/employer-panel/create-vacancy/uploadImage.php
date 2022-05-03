<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Vacancy;

$vacancy_id = Vacancy::getMaxVacancyId();

$extension = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
$filename = uniqid() . $vacancy_id . '.' . $extension;

$path = $_SERVER['DOCUMENT_ROOT'] . "/uploads/images/vacancies/" . $filename; // путь загрузки файла 
move_uploaded_file($_FILES['image']['tmp_name'], $path);

Vacancy::uploadImage($vacancy_id, $filename);