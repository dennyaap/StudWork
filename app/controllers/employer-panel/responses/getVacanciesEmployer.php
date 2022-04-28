<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Vacancy;

session_start();

$employer_id = $_SESSION['user']->id;
Vacancy::getVacanciesEmployer($employer_id);