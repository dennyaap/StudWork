<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/create-vacancy/main.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/create-vacancy/scrollable.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/navbar-panel.css" />
    <title><?= $title ?></title>
</head>

<body>
<div id="app">
    
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
                      <div class="vacancy-card">
                      <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name"><div v-if="vacancyName != ''">{{vacancyName}}</div><div v-else>Название вакансии</div></div>
                            <div class="organization-name"><?= $_SESSION['user']->name_organization ?></div>
                        </div>
                        <div class="vacancy-salary">от {{getSalary(currentSalary)}} руб</div>
                    </div>

                    <div class="vacancy-description">  
                    <div v-if="description != ''">{{description}}</div><div v-else>Описание вакансии...</div>
                    </div>

                    <div class="vacancy-card-footer d-flex justify-content-between align-items-center">
                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback">Откликнуться</button>
                    </div>
                    <div class="preview">
                      Предпросмотр вакансии
                    </div>
                    </div>
                      
                      
                      </div>

                      

                  </div>
                  <div class="col categories-container add-panel">
                    <h2>Заполнение</h2>
                    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for=vacancyName">Название:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="vacancyName" v-model="vacancyName">
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
                  {{ selectedCategoryName }}
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
            <input type="text" class="form-control" id="nameOrganization" value="<?= $_SESSION['user']->name_organization ?>" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="photo">Фото:</label>
        <div class="col-sm-9">
        <div >
            <form>
                <input class="form-control" type="file" name="image" @change="selectImage">
                </form>
                <!-- <button onclick="clearImage()" class="btn btn-primary mt-3">Click me</button> -->
            </div>
            <div id="result">

            </div>
        </div>
    </div>
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
            <textarea rows="3" class="form-control" id="description" placeholder="" required v-model="description"></textarea>
        </div>
    </div>
   
    
    
    <div class="row mb-3">
        <div class="col-sm-9 offset-sm-3">
            <button type="submit" class="btn btn-primary" @click="addVacancy" id="addVacancy">Создать</button>
        </div>
    </div>
    <div class="alert alert-success" role="alert" id="alert" v-show="showAlertSuccess">
                  Вы успешно создали вакансию
              </div>
    <div class="alert-container" id="dangerAlertContainer">
              <div class="alert alert-danger" role="alert" id="alert" v-for="error in errors">
                  {{error}}   
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

    <script src="/app/public/js/employer-panel/Validation.js"></script>
    <script src="/app/public/js/employer-panel/Vacancy.js"></script>
    <script src="/app/public/js/employer-panel/Category.js"></script>
    <script src="/app/public/js/employer-panel/create-vacancy/Graph.js"></script>
    <script src="/app/public/js/employer-panel/create-vacancy/app.js"></script>
</body>

</html>