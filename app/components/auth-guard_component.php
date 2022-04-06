<?php
include_once $_SERVER['DOCUMENT_SERVER'] . '/app/services/Utils.php';

if(!Utils::isAuthorizated()){
    header('Location: /views/auth-form/index.view.php');
    die();
}