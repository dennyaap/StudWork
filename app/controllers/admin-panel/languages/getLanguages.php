<?php
include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
use App\models\Language;

Language::getLanguages();
