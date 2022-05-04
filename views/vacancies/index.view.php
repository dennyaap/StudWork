<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/app/public/css/vacancies/main.css" />
    <link rel="stylesheet" href="/app/public/css/vacancies/scrollable.css" />
    <link rel="stylesheet" href="/app/public/css/vacancies/paginator.css" />
    <link rel="stylesheet" href="/app/public/css/footer.css" />
    <link rel="stylesheet" href="/app/public/css/navbar.css" />
    <title><?= $title ?></title>
</head>

<body>
<div id="app">
    <main>

        
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/navbar_component.php' ?>
      <div class="container mt-5">
        
        <div class="row">
          <div class="col-md-4 p-3">
            <!-- Section: Sidebar -->
            <section>
              <!-- Section: Filters -->
              <section id="filters" data-auto-filter="true">
                <h5 class="d-flex align-items-center"><i class="fa-solid fa-filter"></i><div class="filter-title">Фильтры</div></h5>

                <div class="filter-container">
                <!-- Section: Condition -->
                <section class="mb-4 filter-section" data-filter="condition">
                  <h6 class="font-weight-bold mb-3 filter-name">График работы</h6>

                  <div class="form-check mb-3" v-for="(graph, index) in graphList">
                    <input class="form-check-input" type="checkbox" v-model="graph.isChecked" :id="index">
                    <label class="form-check-label text-uppercase small text-muted" :for="index">
                      {{ graph.name }}
                    </label>
                  </div>

                  
                </section>

                <section class="mb-4 filter-section" data-filter="condition">
                <h6 class="font-weight-bold mb-3 filter-name">По дате</h6>
                <select class="form-select" aria-label="Default select example" v-model="sortDate">
  <option value="DESC">Сначала новые</option>
  <option value="ASC">Сначала старые</option>
</select>
                  
                </section>
                <button @click="setFilter" class="btn-filter">Применить</button>
                </div>
               
              </section>
              <!-- Section: Filters -->
            </section>
            <!-- Section: Sidebar -->
          </div>
          <div class="col-md-8">
           
            <div class="row mb-4 p-3" id="content" style="display: flex;">
                  <div class="col-md-4 search-container">
                    <div class="select-box">
                      <div class="options-container" :class="{active : isActive}">
                        
                      
                        
                      </div>
                      <div class="search-box">
                          <input type="text" placeholder="Название вакансии..." @input="renderVacancies" v-model="like_word"/>
                          <i class="fa-solid fa-magnifying-glass"></i>
                      </div>
                    </div>
                  </div>
                <div class="col-md-4 vacancy-card animation fade-in" v-for="vacancy in vacancies" :data-vacancy_id="vacancy.id">
                 
                    <div class="vacancy-information" @click="goVacancyPage">
                        <div class="vacancy-title">
                            <div class="vacancy-name">{{vacancy.name}}</div>
                            <div class="organization-name">{{vacancy.name_organization}}</div>
                        </div>
                        <div class="vacancy-salary">от {{ getSalary(vacancy.salary) }} руб</div>
                    </div>

                    <div class="vacancy-description">  
                        {{ getDescription(vacancy.description, 100) }}
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback" @click="goVacancyPage"><?php if ($_SESSION['role'] == 'student' || $_SESSION['role'] == '') : ?>Откликнуться<?php elseif ($_SESSION['role'] == 'employer'):?>Посмотреть<?php endif ?></button>
                        <div class="vacancy-date">{{ getDate(vacancy.created_at) }}</div>
                    </div>
                </div>

                
                
                

            </div>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item" @click="changePage(-1)">
                    <span class="page-link"><i class="fa-solid fa-chevron-left"></i></span>
                    </li>
                    <li class="page-item" v-for="numberPage in countPages" :class="{active: numberPage == currentPage}" @click="selectPage(numberPage)"><a class="page-link number-page">{{ numberPage }}</a></li>
                    <li class="page-item">
                    <span class="page-link" @click="changePage(1)"><i class="fa-solid fa-chevron-right"></i></span>
                    </li>
                </ul>
                </nav>
          </div>
        </div>
      </div>
    </main>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/footer_component.php' ?>
</div>
  
    <script src="https://unpkg.com/vue@next"></script>
    <script src="/app/public/js/fetch.js"></script>
    <script src="/app/public/js/vacancies/Graph.js"></script>
    <script src="/app/public/js/vacancies/Vacancy.js"></script>
    <script src="/app/public/js/vacancies/app.js"></script>

</body>

</html>