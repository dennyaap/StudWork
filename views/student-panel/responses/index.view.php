<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="/app/public/css/student-panel/create-resume/main.css" />
    <link rel="stylesheet" href="/app/public/css/student-panel/navbar-panel.css" />
    <title><?= $title ?></title>
</head>

<body>
<div id="app">
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Приглашение</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
          
           
              <div class="row mb-3">
              <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="description">Сообщение:</label>
        <div class="col-sm-9">
            <textarea rows="3" class="form-control" id="description" required v-model="message" disabled></textarea>
        </div>
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
               
              <table class="table table-striped">
                      <thead>
                        <tr>
                        <th class="td-center">N</th>
                          <th>Название</th>
                          <th>Организация</th>
                          <th>Статус</th>
                          <th>Сообщение</th>
                        </tr>
                      </thead>
                      <tbody id="categoriesContainer">
                        <tr class="vacancy-card" v-for="(vacancy, index) in vacancies" :data-id="vacancy.vacancy_id">
                            <td class="td-center">{{ index + 1 }}</td>
                            <td>{{ vacancy.name }}</td>
                            <td>{{ vacancy.name_organization}}</td>
                            <td :style="{color: getStyleStatus(vacancy.status_id)}" class="status">{{ vacancy.status_name}}</td>
                            <td class="td-center"><i class="fas fa-solid fa-message" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap" v-if="vacancy.message != null"  @click="getResponse"></i><span v-else>Нет</span></td>
                            
                            <!-- <td @click="selectVacancy"><input type="radio" class="btn-renderResponses" name="response"></td> -->
                        </tr>
                      </tbody>
                    </table>
                    <div class="alert alert-warning" role="alert" v-show="showWarningAlert">
  Вы пока не оставили резюме ни на одну вакансию
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
    <script src="/app/public/js/student-panel/responses/Vacancy.js"></script>
    <script src="/app/public/js/student-panel/responses/Response.js"></script>
    <script src="/app/public/js/student-panel/responses/app.js"></script>
</body>

</html>