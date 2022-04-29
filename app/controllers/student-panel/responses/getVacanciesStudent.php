<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Vacancy;

session_start();

$student_id = $_SESSION['user']->id;
Vacancy::getVacanciesStudent($student_id);
