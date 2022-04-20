<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="/app/public/css/admin-panel.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/create-vacancy/scrollable.css" />
    <title><?= $title ?></title>
</head>

<body>
<div id="app">
    <!-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Редактировать</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="category-name" class="col-form-label">Название категории</label>
                <label>
  <input type="color" v-model="paletteColorEdit" id="paletteColorEdit">
  
</label>
                <input type="text" v-model="categoryNameEdit" class="form-control" id="categoryNameEdit">
              </div>
               <div class="alert alert-success" role="alert" id="successAlertEdit" v-show="showSuccessAlertEdit">
                      Изменения были пременены!
                      </div>
                    
                      <div id="dangerAlertContainerEdit" v-html="dangerAlertContainerEdit">
                        
                      </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnClose">Закрыть</button>
            <button type="button" class="btn btn-primary" id="btnAccept" @click="acceptEditCategory">Принять</button>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Button trigger modal -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Удаление</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Вы действительно хотите удалить категорию «<span id="category-name-delete">{{ categoryNameDelete }}</span>»?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary" id="btnDeleteCategory" data-bs-dismiss="modal" @click="acceptDeleteCategory(this)">Удалить</button>
          </div>
        </div>
      </div>
    </div> -->
    
    <div class="d-flex" :class="{toggled: isToggledNavbar}" id="wrapper">
        <!-- Sidebar -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/employer-sidebar_component.php' ?>
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3 px-3 container">
            <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/admin-title_component.php' ?>

                

                <ul class="navbar-nav ms-auto">
                <a class="nav-link fw-bold" href="#"
                               >
                               Viktor Rain
                                <!-- <i class="fas fa-user me-2"></i>Viktor Sunset -->
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" class="rounded-circle" id="avatar"
  alt="Avatar" />
                            </a>
                            
                    </ul>
            </nav>

            <div class="container px-4 categories">
                <div class="row d-flex gap-3">
                  <div class="col categories-container edit-panel">
                    <h2>Предосмотр</h2>
                      <div id="form">
                      <!-- Email input -->
                        
                      <!-- <div class="container col-md-6"> -->
                      <!-- <img id="frame" src="" class="img-fluid" />
            <div class="mb-5">
                <input class="form-control" type="file" id="formFile" onchange="preview()">
                <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button>
            </div>
        </div>

        <script>
            function preview() {
                frame.src = URL.createObjectURL(event.target.files[0]);
            }
            function clearImage() {
                document.getElementById('formFile').value = null;
                frame.src = "";
            }
        </script> -->
                      
                      
                      </div>

                      

                  </div>
                  <div class="col categories-container add-panel">
                    <h2>Информация</h2>
                    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="firstName">Название:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="firstName" placeholder="" required v-model="vacancyName">
            
        </div>
    </div>
    <div class="row mb-3">
      <label class="col-sm-3 col-form-label" for="lastName">Категория:</label>
      <div class="col-sm-9">
        <div class="select-box">
          <div class="options-container" :class="{active : isActive}">

            <div class="option">
                  <input type="radio" class="radio" id="film" name="category" />
                  <label for="film">WEB-Разработчик</label>
            </div>

            <div class="option">
                  <input type="radio" class="radio" id="science" name="category" />
                  <label for="science">Водитель</label>
            </div>

            <div class="option">
                  <input type="radio" class="radio" id="art" name="category" />
                  <label for="art">Программист</label>
            </div>

            <div class="option">
                  <input type="radio" class="radio" id="music" name="category" />
                  <label for="music">Программист 1C</label>
            </div>

            <div class="option">
                  <input type="radio" class="radio" id="travel" name="category" />
                  <label for="travel">Электрик</label>
            </div>

            <div class="option">
                  <input type="radio" class="radio" id="sports" name="category" />
                  <label for="sports">Сварщик</label>
            </div>

            <div class="option">
                  <input type="radio" class="radio" id="news" name="category" />
                  <label for="news">Преподаватель</label>
            </div>

            <div class="option">
                  <input type="radio" class="radio" id="tutorials" name="category" />
                  <label for="tutorials">SMM-менеджер</label>
                </div>
            </div>

            <div class="selected" @click="selectCategory">
                  {{ selectedCategory }}
            </div>

            <div class="search-box">
                <input type="text" placeholder="Название категории..." v-model="searchBox"/>
            </div>
        </div>
      </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="lastName">Организация:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="lastName" placeholder="" required v-model="nameOrganization">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="lastName">Фото:</label>
        <div class="col-sm-9">
        <div >
                <input class="form-control" type="file" id="formFile" @change="imagePreview">
                <!-- <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button> -->
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="lastName">Категория:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="lastName" placeholder="" required v-model="nameOrganization">
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="lastName">Опыт работы:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="lastName" placeholder="" required>
        </div>
    </div>               
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="lastName">График:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="lastName" placeholder="" required>
        </div>
    </div>     
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="lastName">Тип занятости:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="lastName" placeholder="" required>
        </div>
    </div>   
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="postalAddress">Описание:</label>
        <div class="col-sm-9">
            <textarea rows="3" class="form-control" id="postalAddress" placeholder="" required></textarea>
        </div>
    </div>
   
    
    
    <div class="row mb-3">
        <div class="col-sm-9 offset-sm-3">
            <input type="submit" class="btn btn-primary" value="Создать">
            <input type="reset" class="btn btn-secondary ms-2" value="Очистить">
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
    <script src="/app/public/js/employer-panel/create-vacancy/app.js"></script>
</body>

</html>