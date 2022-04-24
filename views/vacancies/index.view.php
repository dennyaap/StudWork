<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="/app/public/css/vacancies/main.css" />
    <title><?= $title ?></title>
</head>

<body>
    <main>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-4">
            <!-- Section: Sidebar -->
            <section>
              <!-- Section: Filters -->
              <section id="filters" data-auto-filter="true">
                <h5>Filters</h5>

                <!-- Section: Condition -->
                <section class="mb-4" data-filter="condition">
                  <h6 class="font-weight-bold mb-3">Condition</h6>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="new" id="condition-checkbox">
                    <label class="form-check-label text-uppercase small text-muted" for="condition-checkbox">
                      New
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="used" id="condition-checkbox2">
                    <label class="form-check-label text-uppercase small text-muted" for="condition-checkbox2">
                      Used
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="collectible" id="condition-checkbox3">
                    <label class="form-check-label text-uppercase small text-muted" for="condition-checkbox3">
                      Collectible
                    </label>
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="renewed" id="condition-checkbox4">
                    <label class="form-check-label text-uppercase small text-muted" for="condition-checkbox4">
                      Renewed
                    </label>
                  </div>
                </section>
                <!-- Section: Condition -->

                <!-- Section: Avg. Customer Review -->
                <section class="mb-4">
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
                </section>
                <!-- Section: Avg. Customer Review -->

                <!-- Section: Price -->
                <section class="mb-4">
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
                </section>
                <!-- Section: Price -->

                <!-- Section: Size -->
                <section class="mb-4" data-filter="size">
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
                </section>
                <!-- Section: Size -->

                <!-- Section: Color -->
                <section class="mb-4" data-filter="color">
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
                </section>
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
            <div class="row mb-4" id="content" style="display: flex;">

                <div class="col-md-4 vacancy-card animation fade-in">
                    <!-- <div class="bg-image hover-overlay hover-zoom hover-shadow ripple rounded">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="vacancy-photo">
                        <a href="#!">
                        <div class="mask rounded" style="background-color: rgba(66, 66, 66, 0.2);"></div>
                        </a>
                    </div> -->
                    <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name">PHP-Программист</div>
                            <div class="organization-name">ИП Котельников Владимир Владимирович</div>
                        </div>
                        <div class="vacancy-salary">от 40 000 руб</div>
                    </div>

                    <div class="vacancy-description">  
                        Code review. — Управление командой разработчиков. — Проектирование баз данных. — Построение REST API. — Создание бизнес-логики для различных операций с данными на...
                        Опыт коммерческой разработки на PHP от 6 лет. Уверенные знания PHP 7.x и MySQL/Postgres. Понимание современных подходов в...
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback">Отлкликнуться</button>
                    </div>
                </div>

                <div class="col-md-4 vacancy-card animation fade-in">
                    <!-- <div class="bg-image hover-overlay hover-zoom hover-shadow ripple rounded">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="vacancy-photo">
                        <a href="#!">
                        <div class="mask rounded" style="background-color: rgba(66, 66, 66, 0.2);"></div>
                        </a>
                    </div> -->
                    <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name">PHP-Программист</div>
                            <div class="organization-name">ИП Котельников Владимир Владимирович</div>
                        </div>
                        <div class="vacancy-salary">от 40 000 руб</div>
                    </div>

                    <div class="vacancy-description">  
                        Code review. — Управление командой разработчиков. — Проектирование баз данных. — Построение REST API. — Создание бизнес-логики для различных операций с данными на...
                        Опыт коммерческой разработки на PHP от 6 лет. Уверенные знания PHP 7.x и MySQL/Postgres. Понимание современных подходов в...
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback">Отлкликнуться</button>
                    </div>
                </div>
                <div class="col-md-4 vacancy-card animation fade-in">
                    <!-- <div class="bg-image hover-overlay hover-zoom hover-shadow ripple rounded">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="vacancy-photo">
                        <a href="#!">
                        <div class="mask rounded" style="background-color: rgba(66, 66, 66, 0.2);"></div>
                        </a>
                    </div> -->
                    <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name">PHP-Программист</div>
                            <div class="organization-name">ИП Котельников Владимир Владимирович</div>
                        </div>
                        <div class="vacancy-salary">от 40 000 руб</div>
                    </div>

                    <div class="vacancy-description">  
                        Code review. — Управление командой разработчиков. — Проектирование баз данных. — Построение REST API. — Создание бизнес-логики для различных операций с данными на...
                        Опыт коммерческой разработки на PHP от 6 лет. Уверенные знания PHP 7.x и MySQL/Postgres. Понимание современных подходов в...
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback">Отлкликнуться</button>
                    </div>
                </div>
                <div class="col-md-4 vacancy-card animation fade-in">
                    <!-- <div class="bg-image hover-overlay hover-zoom hover-shadow ripple rounded">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="vacancy-photo">
                        <a href="#!">
                        <div class="mask rounded" style="background-color: rgba(66, 66, 66, 0.2);"></div>
                        </a>
                    </div> -->
                    <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name">PHP-Программист</div>
                            <div class="organization-name">ИП Котельников Владимир Владимирович</div>
                        </div>
                        <div class="vacancy-salary">от 40 000 руб</div>
                    </div>

                    <div class="vacancy-description">  
                        Code review. — Управление командой разработчиков. — Проектирование баз данных. — Построение REST API. — Создание бизнес-логики для различных операций с данными на...
                        Опыт коммерческой разработки на PHP от 6 лет. Уверенные знания PHP 7.x и MySQL/Postgres. Понимание современных подходов в...
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback">Отлкликнуться</button>
                    </div>
                </div>
                <div class="col-md-4 vacancy-card animation fade-in">
                    <!-- <div class="bg-image hover-overlay hover-zoom hover-shadow ripple rounded">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="vacancy-photo">
                        <a href="#!">
                        <div class="mask rounded" style="background-color: rgba(66, 66, 66, 0.2);"></div>
                        </a>
                    </div> -->
                    <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name">PHP-Программист</div>
                            <div class="organization-name">ИП Котельников Владимир Владимирович</div>
                        </div>
                        <div class="vacancy-salary">от 40 000 руб</div>
                    </div>

                    <div class="vacancy-description">  
                        Code review. — Управление командой разработчиков. — Проектирование баз данных. — Построение REST API. — Создание бизнес-логики для различных операций с данными на...
                        Опыт коммерческой разработки на PHP от 6 лет. Уверенные знания PHP 7.x и MySQL/Postgres. Понимание современных подходов в...
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback">Отлкликнуться</button>
                    </div>
                </div>
                <div class="col-md-4 vacancy-card animation fade-in">
                    <!-- <div class="bg-image hover-overlay hover-zoom hover-shadow ripple rounded">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="vacancy-photo">
                        <a href="#!">
                        <div class="mask rounded" style="background-color: rgba(66, 66, 66, 0.2);"></div>
                        </a>
                    </div> -->
                    <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name">PHP-Программист</div>
                            <div class="organization-name">ИП Котельников Владимир Владимирович</div>
                        </div>
                        <div class="vacancy-salary">от 40 000 руб</div>
                    </div>

                    <div class="vacancy-description">  
                        Code review. — Управление командой разработчиков. — Проектирование баз данных. — Построение REST API. — Создание бизнес-логики для различных операций с данными на...
                        Опыт коммерческой разработки на PHP от 6 лет. Уверенные знания PHP 7.x и MySQL/Postgres. Понимание современных подходов в...
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback">Отлкликнуться</button>
                    </div>
                </div>
                <div class="col-md-4 vacancy-card animation fade-in">
                    <!-- <div class="bg-image hover-overlay hover-zoom hover-shadow ripple rounded">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="vacancy-photo">
                        <a href="#!">
                        <div class="mask rounded" style="background-color: rgba(66, 66, 66, 0.2);"></div>
                        </a>
                    </div> -->
                    <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name">PHP-Программист</div>
                            <div class="organization-name">ИП Котельников Владимир Владимирович</div>
                        </div>
                        <div class="vacancy-salary">от 40 000 руб</div>
                    </div>

                    <div class="vacancy-description">  
                        Code review. — Управление командой разработчиков. — Проектирование баз данных. — Построение REST API. — Создание бизнес-логики для различных операций с данными на...
                        Опыт коммерческой разработки на PHP от 6 лет. Уверенные знания PHP 7.x и MySQL/Postgres. Понимание современных подходов в...
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback">Отлкликнуться</button>
                    </div>
                </div>
                <div class="col-md-4 vacancy-card animation fade-in">
                    <!-- <div class="bg-image hover-overlay hover-zoom hover-shadow ripple rounded">
                        <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg" class="vacancy-photo">
                        <a href="#!">
                        <div class="mask rounded" style="background-color: rgba(66, 66, 66, 0.2);"></div>
                        </a>
                    </div> -->
                    <div class="vacancy-information">
                        <div class="vacancy-title">
                            <div class="vacancy-name">PHP-Программист</div>
                            <div class="organization-name">ИП Котельников Владимир Владимирович</div>
                        </div>
                        <div class="vacancy-salary">от 40 000 руб</div>
                    </div>

                    <div class="vacancy-description">  
                        Code review. — Управление командой разработчиков. — Проектирование баз данных. — Построение REST API. — Создание бизнес-логики для различных операций с данными на...
                        Опыт коммерческой разработки на PHP от 6 лет. Уверенные знания PHP 7.x и MySQL/Postgres. Понимание современных подходов в...
                    </div>

                    <div class="feedback">
                        <button class="btn btn-primary btn-feedback">Отлкликнуться</button>
                    </div>
                </div>
                

            </div>
            
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





    <footer class="bg-dark text-white text-center text-lg-left">
      <!-- Socials -->
      <div class="bg-primary text-center p-3">
        <div class="row">
          <div class="col-md-6">
            <span class="font-weight-bold">Get connected with us on social networks!</span>
          </div>
          <div class="col-md-6">
            <i class="fab fa-instagram"></i>
            <i class="fab fa-linkedin-in ml-4"></i>
            <i class="fab fa-twitter ml-4"></i>
            <i class="fab fa-facebook-f ml-4"></i>
          </div>
        </div>
      </div>
      <!-- Socials -->

      <!-- Grid container -->
      <div class="container p-5">
        <!--Grid row-->
        <div class="row p-2">
          <!--Grid column-->
          <div class="col-md-3 mx-auto py-4">
            <h5 class="text-uppercase">About me</h5>
            <hr class="mb-4 mt-0">

            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum dolor
              sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-3 mx-auto py-4">
            <h5 class="text-uppercase">Products</h5>
            <hr class="mb-4 mt-0">

            <ul class="list-unstyled mb-0">
              <li class="mb-2">
                <a href="#!" class="text-white">MDBootstrap</a>
              </li>
              <li class="mb-2">
                <a href="#!" class="text-white">MDWordPress</a>
              </li>
              <li class="mb-2">
                <a href="#!" class="text-white">BrandFlow</a>
              </li>
              <li>
                <a href="#!" class="text-white">Bootstrap Angular</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-3 mx-auto py-4">
            <h5 class="text-uppercase">Useful links</h5>
            <hr class="mb-4 mt-0">

            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#!" class="text-white">Your Account</a>
              </li>
              <li class="mb-2">
                <a href="#!" class="text-white">Become an Affiliate</a>
              </li>
              <li class="mb-2">
                <a href="#!" class="text-white">Shipping Rates</a>
              </li>
              <li>
                <a href="#!" class="text-white">Help</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-3 mx-auto py-4">
            <h5 class="text-uppercase">Contacts</h5>
            <hr class="mb-4 mt-0">

            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#!" class="text-white"><i class="far fa-map mr-1"></i> New York, Avenue Street 10</a>
              </li>
              <li class="mb-2">
                <a href="#!" class="text-white"><i class="fas fa-phone-alt mr-1"></i> 042 876 836 908</a>
              </li>
              <li class="mb-2">
                <a href="#!" class="text-white"><i class="far fa-envelope mr-1"></i> company@example.com</a>
              </li>
              <li>
                <a href="#!" class="text-white"><i class="far fa-clock mr-1"></i> Monday - Friday: 10-17</a>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>
  
  

</body>

</html>