<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/responses/main.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/create-vacancy/scrollable.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/navbar-panel.css" />
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
              <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for=vacancyName">Название:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="vacancyName" v-model="vacancyNameEdit">
        </div>
</div>
<div class="row mb-3">
      <label class="col-sm-3 col-form-label" for="categoryName">Категория:</label>
      <div class="col-sm-9">
        <div class="select-box">
          <div class="options-container" :class="{active : isActive}">

            
            <div class="option category" v-for="category in categories" @click="chooseCategory" :id="category.id" :data-categoryName="category.name">
                 {{ category.name }}
            </div>
            
          </div>

            <div class="selected" @click="hideCategoryList">
                  {{ selectedCategory.name }}
            </div>

            <div class="search-box">
                <input type="text" placeholder="Название категории..." v-model="searchBox" @input="searchLikeCategory"/>
            </div>
        </div>
      </div>
    </div>
              <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="nameOrganization">Организация:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nameOrganization" v-model="selectedVacancy.name_organization" disabled>
        </div>
    </div>
    <!-- <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="photo">Фото:</label>
        <div class="col-sm-9">
        <div >
                <input class="form-control" type="file" id="photo">
                 <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button>
         </div>
        </div>
    </div> -->
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="salary">Зарплата от:</label>
        <div class="col-sm-9">
          <div class="d-flex justify-content-center align-items-center"><input type="text" class="form-control" id="salary" v-model="currentSalary">руб</div>
          <input type="range" class="form-range" min="10000" max="100000" step="1000" id="salary" v-model="currentSalary">
        </div>
    </div>               
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="selectedGraph">График</label>
        <div class="col-sm-9">
        <select class="form-select" aria-label="Default select example" v-model="selectedGraph" id="selectedGraph">
          <option v-for="graph in graphList" :value="graph.id">{{ graph.name }}</option>
        </select>
        </div>
        
    </div>     
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="description">Описание:</label>
        <div class="col-sm-9">
            <textarea rows="3" class="form-control" id="description" placeholder="" required v-model="current_description"></textarea>
        </div>
    </div>
              
              </div>
               <div class="alert alert-success" role="alert" id="successAlertEdit" v-show="showSuccessAlert">
                      Изменения были пременены!
                      </div>
                    
                      
                      <div class="alert alert-danger" role="alert" v-for="error in errors">
                        {{error}}
                      </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnClose">Закрыть</button>
            <button type="button" class="btn btn-primary" id="btnAccept" @click="editVacancy">Принять</button>
          </div>
        </div>
      </div>
    </div>
  

    
    
    <div class="d-flex" :class="{toggled: isToggledNavbar}" id="wrapper">
        <!-- Sidebar -->
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/employer-sidebar_component.php' ?>
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/employer-navbar_component.php' ?>

            <div class="container px-4 categories">
                <div class="row d-flex gap-3">
                <div class="col categories-container edit-panel">
                
                <h2>Выберите организацию</h2>
              <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="td-center">N</th>
                          <th>Название</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="categoriesContainer">
                        <tr class="employer-card" v-for="(employer, index) in employers" :data-id="employer.id">
                          <td class="td-center">{{ index + 1 }}</td>
                          <td>{{ employer.name_organization }}</td>
                         
                          
                          <!-- <td class="td-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-solid fa-trash"></i></td> -->
                          
                           <td class="td-center"><input type="radio" @click="selectEmployer" name="student"></td>
                        </tr>
                      </tbody>
                    </table>
              
                </div>
                <div class="col categories-container add-panel">
                <h2>Вакансии</h2>
                <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="td-center">N</th>
                          <th>Название</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="categoriesContainer">
                        <tr class="vacancy-card" v-for="(vacancy, index) in vacancies" :data-id="vacancy.id">
                          <td class="td-center">{{ index + 1 }}</td>
                          <td>{{ vacancy.name }}</td>
                         
                          
                          <td @click="selectVacancy" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap"><span class="full-text">Подробнее</span></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="alert alert-warning" role="alert" v-show="showAlertWarning">
  У данного работодателя пока-что нету вакансий.
</div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="/app/public/js/fetch.js"></script>
    <script src="/app/public/js/admin-panel/vacancies/Graph.js"></script>
    <script src="/app/public/js/admin-panel/vacancies/Category.js"></script>
    <script src="/app/public/js/admin-panel/vacancies/Vacancy.js"></script>
    <script src="/app/public/js/admin-panel/vacancies/Validation.js"></script>
    <script src="/app/public/js/admin-panel/vacancies/Employer.js"></script>
    <script src="/app/public/js/admin-panel/vacancies/app.js"></script>
</body>

</html>