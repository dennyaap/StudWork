<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/app/public/css/main.css">
    <link rel="stylesheet" type="text/css" href="/app/public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="/app/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="/app/public/css/categories.css">
    <!-- <link href="/app/public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     -->
    
</head>
<body>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/navbar_component.php' ?>

<header>
    <div class="container">
        <div class="header-container">
            <div class="header-information">
                <div class="col-6 header-title">
                    <div class="info">
                        <h1 class="title">Биржа помощи студентам</h1>
                        <h3 class="title">Предлагаем быстрое трудоустройство</h3>
                    </div>
                   
                   <div class="search-container">
                        <form action="#">
                            <div class="input-group">
                                <input name="searchField" id="searchField" type="search" class="form-control" placeholder="Профессия, компания..">
                                <button class="btn" id="btn-search" type="button" id="button-addon2"><img src="/app/public/images/search-icon.svg" alt="search-btn"></button>
                            </div>
                        </form>
                   </div>
                </div>
                <div class="col-6 header-photo-container">
                    <div class="header-photo">
                        <img class="responsive" src="/app/public/images/photo.svg" alt="pic">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>