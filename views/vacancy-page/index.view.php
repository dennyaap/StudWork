<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/app/public/css/vacancy-page/main.css" />
    <link rel="stylesheet" href="/app/public/css/navbar.css" />
    <title><?= $title ?></title>
</head>

<body>
<div id="app">
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/navbar_component.php' ?>
<main class="container">
    <div class="mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="vacancy-container">
                    <div class="row">
                        <h3 class="vacancy-title">{{ vacancy.name }}</h3>
                    </div>
                    <div class="row">
                        <h5>От {{ getSalary(vacancy.salary) }} руб</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6 feedback">
                        <div class="feedback-container">
                                <h4 class="name-organization">{{ vacancy.name_organization }}</h4>
                                <?php if($_SESSION['role'] == 'student' || $_SESSION['role'] == '') :?>
                                    <div class="btn-feedback">
                                        Откликнуться
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="vacancy-photo">
                                <div class="vacancy-photo-container">
                                    без фото
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p>График работы: {{ vacancy.graph_name }}</p>
                    </div>
                    <div class="row">
                        <h4>Описание</h4>
                        <p>{{ vacancy.description }}</p>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-5">
                <div class="row mb-4" id="content">
                    <div class="col-md-4 search-container">
                    ваввав
                    </div>
                    <div class="col-md-4 vacancy-card animation fade-in">
                        аввава
                    </div>
                </div>
          </div>   -->
        </div>
    </div>
</main>

</div>




   
</div>
  
    <script src="https://unpkg.com/vue@next"></script>
    <script src="/app/public/js/fetch.js"></script>
    <script src="/app/public/js/vacancy-page/Vacancy.js"></script>
    <script src="/app/public/js/vacancy-page/app.js"></script>

</body>

</html>