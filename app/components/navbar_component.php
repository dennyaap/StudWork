<?php session_start() ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/navbar_config.php' ?>

<nav class="navbar navbar-light sticky-top navbar-expand-sm bg-light">
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
      <div class="about-user">

        <?php if (!$_SESSION['isAuth']) : ?>
          <a href="/app/controllers/student-panel/create-resume/"><button class="btn" id="btn-resume">Создать резюме</button></a>
          <a href="/app/controllers/auth-form/"><button class="btn" id="btn-auth">Войти</button></a>
      
        <?php else : ?>
          <div class="navbar-nav ms-auto d-flex align-items-center">
                <a class="nav-link fw-bold d-flex align-items-center" href="<?php if($_SESSION['role'] == 'employer') : ?>/app/controllers/employer-panel/create-vacancy/<?php else : ?>/<?php endif ?>">
                                
                                <!-- <i class="fas fa-user me-2">fddfdf</i>
                               -->
                               
                                <?= $_SESSION['user']->full_name ?>
                                <div class="d-flex justify-content-center align-items-center navbar-avatar"
      alt="Avatar">
    <i class="fas fa-user text-info"></i>
    
    </div>
    
    <a href="/app/controllers/logout/" class="text-danger fw-bold btn-logout"><i class="fas fa-arrow-right-from-bracket me-2"></i></a>
                            </a>
                            
                    </div>
        <?php endif ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <span class="navbar-toggler-icon"></span>
            </button>
      </div>
          </div>
        </nav>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
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
