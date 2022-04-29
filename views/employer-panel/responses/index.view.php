<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/responses/main.css" />
    <link rel="stylesheet" href="/app/public/css/employer-panel/navbar-panel.css" />
    <title><?= $title ?></title>
</head>

<body>
<div id="app">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Резюме студента</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
          
            <form>
              <div class="row mb-3">
              <h5 class="modal-title-resume">Информация</h5>
        <label class="col-sm-3 col-form-label" for="nameOrganization">ФИО:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" v-model="selectedResume.full_name" id="nameOrganization" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="photo">Фото:</label>
        <div class="col-sm-9">
        <div >
                <input class="form-control" type="file" id="photo">
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="description">Номер телефона:</label>
        <div class="col-sm-9">
            <input type="tel" class="form-control" v-model="selectedResume.phone" disabled/>
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="description">О себе:</label>
        <div class="col-sm-9">
            <textarea rows="3" class="form-control" id="description" placeholder="" required v-model="selectedResume.about" disabled></textarea>
        </div>
    </div>
    <div class="row mb-3">
    <h5 class="modal-title-resume">Ответить студенту</h5>
        <label class="col-sm-3 col-form-label" for="selectedGraph">Статус</label>
        <div class="col-sm-9">
        <select class="form-select" aria-label="Default select example" v-model="selectedStatus" id="selectedStatus" @change="checkSelectedStatus">
          <option v-for="status in statusList" :value="status.id">{{ status.name }}</option>
        </select>
        </div>
            </form>
            
          </div>
          <div class="row mb-3" v-show="showMessageBox">
        <label class="col-sm-3 col-form-label" for="description">Сообщение:</label>
        <div class="col-sm-9">
            <textarea rows="3" class="form-control" id="description" required v-model="message" placeholder="Приглашаем вас по адресу.. ул.Рассветова д.9"></textarea>
        </div>
    </div>
    <div class="alert alert-success" role="alert" v-show="showAlertResponse">
  Ваш ответ был отправлен.
</div>
    </div> 
 
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnClose">Закрыть</button>
            <button type="button" class="btn btn-primary" id="btnAccept" @click="sendResponse">Отправить</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->

    
    
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
                <h2>Выберите вакансию</h2>
              <table class="table table-striped">
                      <thead>
                        <tr>
                            <th class="td-center">N</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="categoriesContainer">
                        <tr class="vacancy-card" v-for="(vacancy, index) in vacancies" :data-id="vacancy.id">
                            <td class="td-center">{{ index + 1 }}</td>
                            <td>{{ vacancy.name }}</td>
                          
                            <td @click="selectVacancy"><input type="radio" class="btn-renderResponses" name="response"></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="alert alert-warning" role="alert" v-show="showAlertVacancies">
  Вы пока-что не создали ни одной вакансии.
</div>
                </div>
                <div class="col categories-container add-panel">
                  <h2>Отклики</h2>
              <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="td-center">N</th>
                          <th>ФИО</th>
                          <th>Статус</th>
                          <th>Ответить</th>
                        </tr>
                      </thead>
                      <tbody id="categoriesContainer">
                        <tr class="resume-card" v-for="(response, index) in responses" :data-id="response.resume_id">
                          <td class="td-center">{{ index + 1 }}</td>
                          <td>{{ response.full_name }}</td>
                          <td :style="{color: getStyleStatus(response.status_id)}" class="status">{{ response.status_name }}</td>
                          <td class="td-center" @click="selectResume" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap"><i class="fas fa-solid fa-message"></i></td>
                          <!-- <td class="td-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-solid fa-trash"></i></td> -->
                        </tr>
                      </tbody>
                    </table>
                    <div class="alert alert-warning" role="alert" v-show="showAlert">
  На данную вакансию пока-что нет откликов.
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
    <script src="/app/public/js/employer-panel/Vacancy.js"></script>
    <script src="/app/public/js/employer-panel/responses/Resume.js"></script>
    <script src="/app/public/js/employer-panel/responses/Response.js"></script>
    <script src="/app/public/js/employer-panel/responses/Status.js"></script>
    <script src="/app/public/js/employer-panel/responses/app.js"></script>
</body>

</html>