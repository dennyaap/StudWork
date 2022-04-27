<?php

session_start();

$_SESSION['isAuth'] = false;
$_SESSION['user'] = [];
$_SESSION['role'] = '';

header('Location: /');