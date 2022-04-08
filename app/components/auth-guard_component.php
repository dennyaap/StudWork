<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/services/Utils.php';

use App\services\Utils;

if(!Utils::isAutorisation()){
    header('Location: /app/controllers/auth-form/index.php');
    die();
} else {
    header('Location: /');
}