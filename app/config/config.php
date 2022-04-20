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
    ['name' => 'Навыки', 'link' => '/app/controllers/admin-panel/skills/', 'icon' => 'fa-thin fa-hand-holding-heart'],
    ['name' => 'Языки', 'link' => '/app/controllers/admin-panel/languages/', 'icon' => 'fa-thin fa-language'], 
    ['name' => 'Резюме', 'link' => '/app/controllers/admin-panel/skills/', 'icon' => 'fa-regular fa-clipboard-user'],
    ['name' => 'Вакансии', 'link' => '/app/controllers/admin-panel/languages/', 'icon' => 'fa-regular fa-clipboard'] 
];

