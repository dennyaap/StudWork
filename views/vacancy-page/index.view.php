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
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Выберите резюме</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col categories-container add-panel">
              <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="td-center">N</th>
                          <th>Дата создания</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="categoriesContainer">
                        <tr class="resume-card" v-for="(resume, index) in resumeList" :data-id="resume.id">
                          <td class="td-center">{{ index + 1 }}</td>
                          <td>{{ resume.created_at }}</td>
                          <td>Подробнее</td>
                          <td><input type="radio" name="resume" :checked='resume.id == selectedResumeId' @click="selectResume"></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                    <div class="alert alert-success" role="alert" v-show="showSuccessAlert">
        Вы успешно оставили свое резюме. В ближайшее время ждите ответа!
        </div>
        <div class="alert alert-danger" role="alert" v-show="showDangerAlert">
       Вы уже оставляли резюме на данную вакансию. В ближайшее время ждите ответа!
        </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btnClose" data-bs-dismiss="modal">Закрыть</button>
        <button type="button" class="btn btn-primary btn-sendResume" @click="sendResume">Отправить</button>
      </div>
    </div>
  </div>
</div>
<main class="container">
    <div class="mt-5">
        <div class="row">
            <div class="col-md-7">
                <div class="vacancy-container">
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-center justify-content-between">
                            <div class="vacancy-title-container">
                                <h3 class="vacancy-title">{{ vacancy.name }}</h3>
                                <h5>От {{ getSalary(vacancy.salary) }} руб</h5>
                                <div class="graph-container">
                                    <p>График работы: {{ vacancy.graph_name }}</p>
                                </div>
                            </div>
                        
                            <div class="vacancy-photo">
                                <div class="vacancy-photo-container">
                                    без фото
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 feedback">
                            <div class="feedback-container">
                                <h4 class="name-organization">{{ vacancy.name_organization }}</h4>
                                <?php if($_SESSION['role'] == 'student') :?>
                                    <button class="btn-feedback" data-bs-toggle="modal" data-bs-target="#exampleModal2" @click="renderResumeStudent">
                                        Оставить резюме
                                    </button>
                                <?php elseif(!$_SESSION['isAuth']) :?>
                                  <a href="/app/controllers/auth-form/">
                                    <button class="btn-feedback" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                        Оставить резюме
                                    </button>
                                  </a>
                                <?php endif ?>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                       <div class="description">
                            <h4>Описание</h4>
                            <p>{{ vacancy.description }}</p>
                       </div>
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
    <script src="/app/public/js/vacancy-page/Validation.js"></script>
    <script src="/app/public/js/vacancy-page/Vacancy.js"></script>
    <script src="/app/public/js/vacancy-page/Resume.js"></script>
    <script src="/app/public/js/vacancy-page/app.js"></script>

</body>

</html>