<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Employer;

Employer::getEmployers();
