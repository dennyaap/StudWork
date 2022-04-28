<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="/app/public/css/student-panel/create-resume/main.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/create-vacancy/scrollable.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/navbar-panel.css" />
    <title><?= $title ?></title>
</head>

<body>
<div id="app">
    
    <div class="d-flex" :class="{toggled: isToggledNavbar}" id="wrapper">
        <!-- Sidebar -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/student-sidebar_component.php' ?>
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/student-navbar_component.php' ?>

            <div class="container px-4 categories">
                <div class="row d-flex gap-3">
                  
                  <div class="col col-md-8 categories-container add-panel">
                    <h2>Заполнение</h2>
                   
    
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="nameOrganization">ФИО:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nameOrganization" value="<?= $_SESSION['user']->full_name ?>" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="photo">Фото:</label>
        <div class="col-sm-9">
        <div >
                <input class="form-control" type="file" id="photo" @change="imagePreview">
                <!-- <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button> -->
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="description">Номер телефона:</label>
        <div class="col-sm-9">
            <input type="tel" class="form-control" v-model="phone"/>
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="description">Расскажите о себе:</label>
        <div class="col-sm-9">
            <textarea rows="3" class="form-control" id="description" placeholder="" required v-model="about"></textarea>
        </div>
    </div>
   
    
    <div class="row mb-3">
        <div class="col-sm-9 offset-sm-3">
            <button type="submit" class="btn btn-primary" @click="createResume" id="addVacancy">Создать</button>
        </div>
    </div>
    <div class="alert-container" id="dangerAlertContainer">
              <div class="alert alert-danger" role="alert" id="alert" v-for="error in errors">
                  {{error}}   
              </div>
            </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="/app/public/js/fetch.js"></script>
    <script src="/app/public/js/student-panel/Validation.js"></script>
    <script src="/app/public/js/student-panel/Resume.js"></script>
    <script src="/app/public/js/student-panel/create-resume/app.js"></script>
</body>

</html>