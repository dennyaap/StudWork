<?php session_start() ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/navbar_config.php' ?>

<nav class="navbar navbar-light sticky-top navbar-expand-sm">
          <div class="container navbar-container">
            <div class="left d-flex align-items-center">
            <span class="navbar-brand mb-0 h1">StudWork</span>
            <ul class="navbar-nav mr-auto">
        <?php foreach($routes as $route) : ?>
          <li class="nav-item">
          <a href="<?= $route['link'] ?>" class="nav-link"><?= $route['name'] ?></a>
        </li>
        <?php endforeach ?>
      </ul>
            </div>
      <div class="about-user d-flex">

       
        <?php if (!$_SESSION['isAuth']) : ?>
          <a href="<?php if($_SESSION['isAuth'] == true && $_SESSION['role'] == 'student') : ?><?='/app/controllers/student-panel/create-resume/'?><?php else :?><?='/app/controllers/auth-form/'?><?php endif?>"><button class="btn" id="btn-resume">Создать резюме</button></a>
          <a href="/app/controllers/auth-form/"><button class="btn" id="btn-auth">Войти</button></a>
      
        <?php else : ?>
          <div class="navbar-nav ms-auto d-flex align-items-center">
                <a class="nav-link fw-bold d-flex align-items-center" href="<?php if($_SESSION['role'] == 'employer') : ?><?='/app/controllers/employer-panel/create-vacancy/'?><?php else : ?><?='/app/controllers/student-panel/create-resume/'?><?php endif ?>">
                                
                                <!-- <i class="fas fa-user me-2">fddfdf</i>
                               -->
                               
                                <?= explode(' ', $_SESSION['user']->full_name)[1] ?>
                                <div class="d-flex justify-content-center align-items-center navbar-avatar"
      alt="Avatar">
      
    <i class="fas fa-user text-info"></i>
    
    
    </div>
    
                            </a>
    
                            <?php if($_SESSION['role'] == 'student') :?><a href="/app/controllers/student-panel/create-resume/"><button class="btn" id="btn-resume">Создать резюме</button></a><?php else :?><a href="/app/controllers/employer-panel/create-vacancy/"><button class="btn" id="btn-resume">Создать вакансию</button></a><?php endif?>
                            
                    </div>
                    
        <?php endif ?>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <span class="navbar-toggler-icon"></span>
            </button>
      </div>
          </div>
        </nav>
<div class="modal modal1 fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content modal-content1">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Создать резюме</li>
        <li class="list-group-item">Отклики</li>
        <li class="list-group-item">Профиль</li>
      </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
