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

        <!-- <nav class="navbar navbar-light bg-light">
          <div class="container">
            <span class="navbar-brand mb-0 h1">StudWork</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </nav> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> -->
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/navbar_component.php' ?>
      <div class="container mt-5">
        
        <div class="row">
          <div class="col-md-4 p-3">
            <!-- Section: Sidebar -->
            <section>
              <!-- Section: Filters -->
              <section id="filters" data-auto-filter="true">
                <h5 class="d-flex align-items-center"><i class="fa-solid fa-filter"></i><div class="filter-title">Фильтры</div></h5>

                <!-- Section: Condition -->
                <section class="mb-4 filter-section" data-filter="condition">
                  <h6 class="font-weight-bold mb-3 filter-name">График работы</h6>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="new" id="condition-checkbox">
                    <label class="form-check-label text-uppercase small text-muted" for="condition-checkbox">
                      Полный день
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="used" id="condition-checkbox2">
                    <label class="form-check-label text-uppercase small text-muted" for="condition-checkbox2">
                      Не полный день
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="collectible" id="condition-checkbox3">
                    <label class="form-check-label text-uppercase small text-muted" for="condition-checkbox3">
                      2/2
                    </label>
                  </div>

                  
                </section>
                <!-- Section: Condition -->

                <!-- Section: Avg. Customer Review -->
                <!-- <section class="mb-4">
                  <h6 class="font-weight-bold mb-3">Avg. Customer Review</h6>

                  <ul class="rating" data-toggle="rating" id="filter-rating" tabindex="0">
                    <li>
                      <i class="far fa-star fa-sm text-primary" title="" data-toggle="tooltip" data-original-title="1"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary" title="" data-toggle="tooltip" data-original-title="2"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary" title="" data-toggle="tooltip" data-original-title="3"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary" title="" data-toggle="tooltip" data-original-title="4"></i>
                    </li>
                    <li>
                      <i class="far fa-star fa-sm text-primary" title="" data-toggle="tooltip" data-original-title="5"></i>
                    </li>
                  </ul>
                </section> -->
                <!-- Section: Avg. Customer Review -->

                <!-- Section: Price -->
                <!-- <section class="mb-4">
                  <h6 class="font-weight-bold mb-3">Price</h6>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="price-radio">
                    <label class="form-check-label text-uppercase small text-muted" for="price-radio">
                      Under $25
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="price-radio2">
                    <label class="form-check-label text-uppercase small text-muted" for="price-radio2">
                      $25 to $50
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="price-radio3">
                    <label class="form-check-label text-uppercase small text-muted" for="price-radio3">
                      $50 to $100
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="price-radio4">
                    <label class="form-check-label text-uppercase small text-muted" for="price-radio4">
                      $100 to $200
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="price-radio5">
                    <label class="form-check-label text-uppercase small text-muted" for="price-radio5">
                      $200 &amp; above
                    </label>
                  </div>
                </section> -->
                <!-- Section: Price -->

                <!-- Section: Size -->
                <!-- <section class="mb-4" data-filter="size">
                  <h6 class="font-weight-bold mb-3">Size</h6>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="34" id="price-checkbox">
                    <label class="form-check-label text-uppercase small text-muted" for="price-checkbox">
                      34
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="36" id="price-checkbox2">
                    <label class="form-check-label text-uppercase small text-muted" for="price-checkbox2">
                      36
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="38" id="price-checkbox3">
                    <label class="form-check-label text-uppercase small text-muted" for="price-checkbox3">
                      38
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="40" id="price-checkbox4">
                    <label class="form-check-label text-uppercase small text-muted" for="price-checkbox4">
                      40
                    </label>
                  </div>
                </section> -->
                <!-- Section: Size -->

                <!-- Section: Color -->
                <!-- <section class="mb-4" data-filter="color">
                  <h6 class="font-weight-bold mb-3">Color</h6>

                  <div class="form-check form-check-inline m-0 p-0 pr-3">
                    <input class="btn-check" type="radio" name="colorRadio" id="colorRadio1" value="white">
                    <label class="btn bg-light btn-rounded p-3" for="colorRadio1"></label>
                  </div>

                  <div class="form-check form-check-inline m-0 p-0 pr-3">
                    <input class="btn-check" type="radio" name="colorRadio" id="colorRadio2" value="grey">
                    <label class="btn btn-rounded p-3" for="colorRadio2" style="background-color: #bdbdbd"></label>
                  </div>

                  <div class="form-check form-check-inline m-0 p-0 pr-3">
                    <input class="btn-check" type="radio" name="colorRadio" id="colorRadio3" value="black">
                    <label class="btn bg-dark text-white btn-rounded p-3" for="colorRadio3"></label>
                  </div>

                  <div class="form-check form-check-inline m-0 p-0 pr-3">
                    <input class="btn-check" type="radio" name="colorRadio" id="colorRadio5" value="blue">
                    <label class="btn bg-primary btn-rounded p-3" for="colorRadio5"></label>
                  </div>

                  <div class="form-check form-check-inline mt-3 mr-0 p-0 pr-3">
                    <input class="btn-check" type="radio" name="colorRadio" id="colorRadio9" value="red">
                    <label class="btn bg-danger btn-rounded p-3" for="colorRadio9"></label>
                  </div>

                  <div class="form-check form-check-inline mt-3 mr-0 p-0 pr-3">
                    <input class="btn-check" type="radio" name="colorRadio" id="colorRadio10" value="orange">
                    <label class="btn bg-warning btn-rounded p-3" for="colorRadio10"></label>
                  </div>
                </section> -->
                <!-- Section: Color -->
              </section>
              <!-- Section: Filters -->
            </section>
            <!-- Section: Sidebar -->
          </div>
          <div class="col-md-8">
            <!-- <div class="row justify-content-center">
              <div class="col-md-6 my-auto py-3">
                <div id="select-wrapper-515527" class="select-wrapper"><div class="form-outline">Sort</label><span class="select-arrow"></span><div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 32px;"></div><div class="form-notch-trailing"></div></div></div><select class="select initialized" id="sort-select">
                  <option value="1">Best rating</option>
                  <option value="2">Lowest price first</option>
                  <option value="3">Highest price first</option>
                </select></div>
                
              </div>
            </div> -->
            <div class="row mb-4 p-3" id="content" style="display: flex;">
                  <div class="col-md-4 search-container">
                    <div class="select-box">
                      <div class="options-container" :class="{active : isActive}">
                        <div class="option category">
                            1
                        </div>
                        <div class="option category">
                            2
                        </div>
                        <div class="option category">
                            3
                        </div>
                        <div class="option category">
                            1
                        </div>
                      
                        
                      </div>
                      <div class="search-box">
                          <input @click="hide" type="text" placeholder="Название категории..."/>
                          <i class="fa-solid fa-magnifying-glass"></i>
                      </div>
                    </div>
                  </div>
                <div class="col-md-4 vacancy-card animation fade-in" v-for="vacancy in vacancies" :data-vacancy_id="vacancy.id">
                    <!-- <div class="bg-image hover-overlay hover-zoom hover-shadow ripple rounded">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="vacancy-photo">
                        <a href="#!">
                        <div class="mask rounded" style="background-color: rgba(66, 66, 66, 0.2);"></div>
                        </a>
                    </div> -->
                    <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name">{{vacancy.name}}</div>
                            <div class="organization-name">{{vacancy.name_organization}}</div>
                        </div>
                        <div class="vacancy-salary">от {{ getSalary(vacancy.salary) }} руб</div>
                    </div>

                    <div class="vacancy-description">  
                        {{ vacancy.description }}
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback" @click="goVacancyPage">Откликнуться</button>
                        <div class="vacancy-date">{{ vacancy.created_at }}</div>
                    </div>
                </div>

                
                
                

            </div>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item">
                    <span class="page-link"><i class="fa-solid fa-chevron-left"></i></span>
                    </li>
                    <li class="page-item active"><a class="page-link number-page" href="#">1</a></li>
                    <li class="page-item" aria-current="page">
                    <span class="page-link number-page">2</span>
                    </li>
                    <li class="page-item number-page"><a class="page-link number-page" href="#">3</a></li>
                    <li class="page-item">
                    <span class="page-link"><i class="fa-solid fa-chevron-right"></i></span>
                    </li>
                </ul>
                </nav>
            <!-- <div class="row">
              <div class="col-md-12 mt-3 text-center">
                <div class="spinner-border text-primary mx-auto my-5" id="spinner" role="status" style="display: none;">
                  <span class="sr-only">Loading...</span>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </main>

    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/footer_component.php' ?>
</div>
  
    <script src="https://unpkg.com/vue@next"></script>
    <script src="/app/public/js/fetch.js"></script>
    <script src="/app/public/js/vacancies/Vacancy.js"></script>
    <script src="/app/public/js/vacancies/app.js"></script>

</body>

</html>