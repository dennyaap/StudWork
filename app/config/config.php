<?php
const CONFIG_CONNECTION = [
    'host' => 'localhost',
    'dbname' => 'studwork',
    'login' => 'root',
    'password' => '',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]
];

session_start();

$routes = [
    ['name' => 'Категории', 'link' => '/app/controllers/admin-panel/categories/', 'icon' => 'fa-align-left'],
    ['name' => 'Резюме', 'link' => '/app/controllers/admin-panel/resume/', 'icon' => 'fa-regular fa-clipboard-user'],
    ['name' => 'Вакансии', 'link' => '/app/controllers/admin-panel/vacancies/', 'icon' => 'fa-regular fa-clipboard'] 
];

$pathImages = $_SERVER['DOCUMENT_ROOT'] . '/uploads/images/vacancies';
