<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/config.php';
$title = 'Категории';

if($_SESSION['role'] != 'admin'){
    Header("location: /admin/");
    die();
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/views/admin-panel/categories/index.view.php';