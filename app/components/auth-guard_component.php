<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/services/Utils.php';

use App\services\Utils;

if(!Utils::isAutorisation()){
    header('Location: /views/auth-form/index.view.php');
    die();
} else {
    header('Location: /');
}