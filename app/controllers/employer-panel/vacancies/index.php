<?php
session_start();
$title = 'Мои вакансии';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/employer_config.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/views/employer-panel/vacancies/index.view.php';