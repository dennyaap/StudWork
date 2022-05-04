<?php session_start(); ?>
<nav class="navbar navbar-expand-sm navbar-light">
  <div class="container navbar-container">
    <a href="#" class="navbar-brand"><img id="logo" src="/app/public/images/logo.svg" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a href="#" class="nav-link">Главная</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Вакансии</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">О нас</a>
        </li>
      </ul>

      <div class="buttons">
        <button class="btn" id="btn-resume">Создать резюме</button>

        <?php if (!isset($_SESSION['isAuth'])) : ?>
          <a href="/app/controllers/auth-form/"><button class="btn" id="btn-auth">Войти</button></a>
      
        <?php else : ?>
          <div class="navbar-nav ms-auto">
                <a class="nav-link fw-bold" href="#"
                               >
                                
                                <?= $_SESSION['user']->name ?>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" class="rounded-circle" id="avatar"
  alt="Avatar" />
                            </a>
                            
                    </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</nav>
