<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Category;

Category::getCategoriesJSON();