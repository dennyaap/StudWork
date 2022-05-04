<!-- Page Content -->
<div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3 px-3 container">
            <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/student-title.component.php' ?>

                

                <ul class="navbar-nav ms-auto">
                <a class="nav-link fw-bold d-flex align-items-center" href="#"
                               >
                               <?= explode(' ', $_SESSION['user']->full_name)[1] ?>
                                <div class="rounded-circle border d-flex justify-content-center align-items-center"
                                                style="width:30px;height:30px;margin-left:10px;"
                                        alt="Avatar">
                                        <i class="fas fa-user text-info"></i>
                                        </div>
                            </a>
                            
                    </ul>
                    <a href="/app/controllers/logout/" class="text-danger fw-bold btn-logout"><i class="fas fa-arrow-right-from-bracket me-2"></i></a>
            </nav>