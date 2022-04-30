<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/app/public/css/admin-auth/style.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/navbar-panel.css" />
    <title><?= $title ?></title>
  </head>
  <body>
    <div id="app">
  <section>
  <div class="container py-5">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        
        <form class="d-flex justify-content-center flex-column">
        <h2 class="title d-flex justify-content-center">Администратор</h2>
          <!-- Email input -->
          <div class="row">
          <div class="auth-container">
          <div class="input-field">
              <i class="fas fa-solid fa-envelope"></i>
              <input type="email" placeholder="Логин" id="email" v-model="email"/>
            </div>

          <!-- Password input -->
          <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Пароль" id="password" v-model="password"/>
            </div>
          </div>
          </div>
          <div class="alert alert-danger" role="alert" v-for="error in errors">
  {{ error }}
</div>
            <div class="button-login d-flex justify-content-center"><button type="submit" class="btn solid" id="studentAuthBtn" @click="checkAuth">Войти</button></div>
        </form>
      </div>
    </div>
  </div>
</section>
</div>
<script src="https://unpkg.com/vue@next"></script>
<script src="/app/public/js/fetch.js"></script>
<script src="/app/public/js/auth-admin/Auth.js"></script>
<script src="/app/public/js/auth-admin/Validation.js"></script>
<script src="/app/public/js/auth-admin/app.js"></script>
  </body>
</html><!-- form  -->