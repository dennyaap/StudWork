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
            <h5 class="modal-title" id="exampleModalLabel">Редактировать</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
          </div>
          <div class="modal-body">
            <form>
            <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="nameOrganization">ФИО:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="nameOrganization" v-model="selectedResume.full_name" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="description">Номер телефона:</label>
        <div class="col-sm-9">
            <input type="tel" class="form-control" v-model="phone"/>
        </div>
    </div>
   
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label" for="description">О себе:</label>
        <div class="col-sm-9">
            <textarea rows="3" class="form-control" id="description" placeholder="" required v-model="about"></textarea>
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
            <button type="button" class="btn btn-primary" id="btnAccept" @click="editResume">Принять</button>
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
                
                <h2>Выберите студента</h2>
              <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="td-center">N</th>
                          <th>ФИО</th>
                          <th>Просмотр</th>
                        </tr>
                      </thead>
                      <tbody id="categoriesContainer">
                        <tr class="student-card" v-for="(student, index) in students" :data-id="student.id">
                          <td class="td-center">{{ index + 1 }}</td>
                          <td>{{ student.full_name }}</td>
                          <!-- <td>{{ student.full_name }}</td> -->
                          <!-- <td :style="{color: getStyleStatus(response.status_id)}" class="status">{{ response.status_name }}</td> -->
                          
                          <!-- <td class="td-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-solid fa-trash"></i></td> -->
                          
                           <td class="td-center"><input type="radio" @click="selectStudent" name="student"></td>
                        </tr>
                      </tbody>
                    </table>
              
                </div>
                <div class="col categories-container add-panel">
                <h2>Резюме</h2>
                <table class="table table-striped">
                      <thead>
                        <tr>
                            <th class="td-center">N</th>
                          <th>Дата создания</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="categoriesContainer">
                        <tr class="resume-card" v-for="(resume, index) in resumeList" :data-id="resume.id">
                            <td class="td-center">{{ index + 1 }}</td>
                            <td>{{ getDate(resume.created_at) }}</td>
                          
                            <td @click="showResume" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap"><span class="full-text">Подробнее</span></td>
                        </tr>
                        
                      </tbody>
                      
                    </table>
                    <div class="alert alert-warning" role="alert" v-show="showAlertWarning">
  Данный студент пока-что не создавал резюме.
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
    <script src="/app/public/js/admin-panel/resume/Resume.js"></script>
    <script src="/app/public/js/admin-panel/resume/Student.js"></script>
    <script src="/app/public/js/admin-panel/resume/Validation.js"></script>
    <script src="/app/public/js/admin-panel/resume/app.js"></script>
</body>

</html>