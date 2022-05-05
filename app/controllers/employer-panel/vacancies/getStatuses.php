<?php

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Vacancy_status;

Vacancy_status::getStatuses();