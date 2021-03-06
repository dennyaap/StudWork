<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="/app/public/css/auth-form/style.css" />
    <title><?= $title ?></title>
  </head>
  <body>
  <div id="app"> 
    <div class="container" :class="{ 'sign-up-mode': authMode }">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" class="sign-in-form">
            <h2 class="title">Студент</h2>
            <div class="input-field">
              <i class="fas fa-solid fa-envelope"></i>
              <input type="email" placeholder="E-mail" id="studentEmail" v-model="studentEmail"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Пароль" id="studentPassword" v-model="studentPassword"/>
            </div>
            
           
            <button type="submit" class="btn solid" id="studentAuthBtn" @click="checkAuth"><div class="loading" id="studentSpinner" v-show="showStudentLoader"></div><div v-show="showStudentBtnText">Войти</div></button>

            <p class="social-text"><a href="/app/controllers/registration-form/">Зарегистроваться</a></p>

            
            <div class="alert-container" id="dangerAlertStudentContainer" v-show="dangerAlertStudentContainer">
              <div class="alert alert-danger" role="alert" id="alert" v-for="error in errors">
                  {{error}}   
              </div>
            </div>
       
          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Работодатель</h2>
            
            
            <div class="input-field">
              <i class="fas fa-solid fa-envelope"></i>
              <input type="text" placeholder="E-mail" v-model="employerEmail"/>
            </div>
            
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Пароль" v-model="employerPassword"/>
            </div>
            <button type="submit" class="btn solid" id="employerAuthBtn" @click="checkAuthEmployer"><div class="loading" id="employerSpinner" v-show="showEmployerLoader"></div><div v-show="showEmployerBtnText">Войти</div></button>
            <p class="social-text"><a href="/app/controllers/registration-form/">Зарегистроваться</a></p>

            <div class="alert-container" id="dangerAlertEmployerContainer" v-show="dangerAlertEmployerContainer">
              <div class="alert alert-danger" role="alert" id="alert" v-for="error in errorsEmployer">
                  {{error}}   
              </div>
            </div>
      
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Вы работодатель ?</h3>
            <p>
              Находите первоклассных амбициозных сотрудников
            </p>
            <button class="btn transparent" id="sign-up-btn" @click="changeAuthMode">
              Войти
            </button>
          </div>
          <img src="/app/public/images/auth-form/img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Вы студент ?</h3>
            <p>
              Начни свою карьеру уже сейчас!
            </p>
            <button class="btn transparent" id="sign-in-btn" @click="changeAuthMode">
              Войти
            </button>
          </div>
          <img src="/app/public/images/auth-form/img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>
</div>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="/app/public/js/fetch.js"></script>
    <script src="/app/public/js/admin-panel/Alert.js"></script>
    <script src="/app/public/js/admin-panel/Validation.js"></script>
    <script src="/app/public/js/Autorisation.js"></script>
    <script src="/app/public/js/auth-form/app.js"></script>
  </body>
</html>
