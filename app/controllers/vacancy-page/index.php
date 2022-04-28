<?php

session_start();

// include_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
// use App\models\Vacancy;

// $vacancy = Vacancy::getVacancy($_GET['vacancy_id']);

$title = 'Вакансия';
include_once $_SERVER['DOCUMENT_ROOT'] . '/views/vacancy-page/index.view.php';