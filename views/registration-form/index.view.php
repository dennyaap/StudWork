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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/app/public/css/registration-form/gender_component.css" />
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
              <i class="fas fa-user"></i>
              <input type="text" placeholder="ФИО" id="studentName" v-model="studentFullName"/>
            </div>
            
            <div class="form_radio">
            <div class="form_radio_btn">
	<input id="maleRadio" type="radio" name="radio" value="м" v-model="gender" checked>
	<label for="maleRadio">М</label>
</div>
 
<div class="form_radio_btn">
	<input id="femaleRadio" type="radio" name="radio" v-model="gender" value="ж">
	<label for="femaleRadio">Ж</label>
</div>
            </div>
            <div class="input-field">
              <i class="fas fa-solid fa-envelope"></i>
              <input type="email" placeholder="E-mail" id="studentEmail" v-model="studentEmail"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Пароль" id="studentPassword" v-model="studentPassword"/>
            </div>
            
            
           
            <button type="submit" class="btn solid" id="studentAuthBtn" @click="createAccount"><div class="loading" id="studentSpinner" v-show="showStudentLoader"></div><div v-show="showStudentBtnText">Создать</div></button>

            <p class="social-text"><a href="/app/controllers/auth-form/">Уже есть учетная запись?</a></p>

            
            <div class="alert-container" id="dangerAlertStudentContainer" v-show="dangerAlertStudentContainer">
              <div class="alert alert-danger" role="alert" id="alert" v-for="error in errors">
                  {{error}}   
              </div>
            </div>
            <!-- <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div> -->

          </form>
          <form action="#" class="sign-up-form">
            <h2 class="title">Работодатель</h2>
            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="ФИО" v-model="employerFullName"/>
            </div>
            
            <div class="form_radio">
            <div class="form_radio_btn">
	<input id="maleRadio1" type="radio" name="radio" value="м" v-model="employerGender" checked>
	<label for="maleRadio1">М</label>
</div>
 
<div class="form_radio_btn">
	<input id="femaleRadio2" type="radio" name="radio" v-model="employerGender" value="ж">
	<label for="femaleRadio2">Ж</label>
</div>
            </div>
            <div class="input-field">
            <i class="fa-solid fa-building"></i>
              <input type="text" placeholder="Название организации" v-model="employerNameOrganization"/>
            </div>
            <div class="input-field">
              <i class="fas fa-solid fa-phone"></i>
              <input type="text" placeholder="Телефон" v-model="employerPhone"/>
            </div>
            <div class="input-field">
              <i class="fas fa-solid fa-envelope"></i>
              <input type="email" placeholder="E-mail" v-model="employerEmail"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Пароль" v-model="employerPassword"/>
            </div>

            <div class="alert-container" id="dangerAlertEmployerContainer" v-show="dangerAlertEmployerContainer">
              <div class="alert alert-danger" role="alert" id="alert" v-for="error in employerErrors">
                  {{error}}   
              </div>
            </div>
            
            
            <button type="submit" class="btn solid" id="employerAuthBtn" @click="createEmployerAccount"><div class="loading" id="studentSpinner" v-show="showEmployerLoader"></div><div v-show="showEmployerBtnText">Создать</div></button>
            <p class="social-text"><a href="/app/controllers/auth-form/">Уже есть учетная запись?</a></p>
            <!-- <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div> -->
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
              Создать
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
              Создать
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
    <script src="/app/public/js/registration-form/Validation.js"></script>
    <script src="/app/public/js/Autorisation.js"></script>
    <script src="/app/public/js/registration-form/Registration.js"></script>
    <script src="/app/public/js/registration-form/app.js"></script>
  </body>
</html>
