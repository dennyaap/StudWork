<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="/app/public/css/admin-panel.css" />
    <title><?= $title ?></title>
</head>

<body>
<div id="app">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </div>

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    </div>
    
    <div class="d-flex" :class="{toggled: isToggledNavbar}" id="wrapper">
        <!-- Sidebar -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/admin-sidebar_component.php' ?>
        
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
                  <h2>Добавить</h2>
                    <div id="form">
                    <!-- Email input -->
                      <div class="form-outline mb-4 d-flex">
                      <label>
  <input type="color" v-model="paletteColor" id="paletteColor">
  
</label>
                        <input type="text" id="categoryInput" class="form-control" placeholder="Название" v-model="nameCategory"/>
                        <button class="btn" id="btnAdd" @click="addCategory"><i class="fas fa-solid fa-plus"></i></button>
                      </div>
                      <div class="alert alert-success" role="alert" id="successAlert" v-show="showAlertSuccessElement">
                      Запись была добавлена!
                      </div>
                     <div id="dangerAlertContainer" v-html="dangerAlertContainerCreate">
                      
                     </div>
                     
                    </div>
                    
                </div>
                <div class="col categories-container add-panel">
                  <h2>Список</h2>
              <table class="table table-striped">
                      <thead>
                        <tr>
                          <th></th>
                          <th class="td-center">N</th>
                          <th>Название</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="categoriesContainer">
                        <tr class="category-id" v-for="(category, index) in categories" :data-id="category.id">
                          <td :style="{background: category.color }" class="category-color"></td>
                          <td class="td-center">{{ index + 1 }}</td>
                          <td>{{ category.name }}</td>
                          <td @click="showEditCategory" class="td-center" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap"><i class="fas fa-solid fa-pen"></i></onclick=></td>
                          <td @click="showDeleteCategory" class="td-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-solid fa-trash"></i></td>
                        </tr>
                      </tbody>
                    </table>
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
    <script src="/app/public/js/admin-panel/categories/Card.js"></script>
    <script src="/app/public/js/admin-panel/Alert.js"></script>
    <script src="/app/public/js/admin-panel/Validation.js"></script>
    <script src="/app/public/js/admin-panel/categories/Category.js"></script>
    <script src="/app/public/js/admin-panel/categories/app.js"></script>
</body>

</html>