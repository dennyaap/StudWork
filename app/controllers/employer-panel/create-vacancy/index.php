<?php
session_start();
$title = 'Создать вакансию';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/employer_config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/views/employer-panel/create-vacancy/index.view.php';