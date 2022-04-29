<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Resume;

session_start();

$student_id = $_SESSION['user']->id;
Resume::getResumeStudent($student_id);