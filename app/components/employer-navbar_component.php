<!-- Page Content -->
<div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-3 px-3 container">
            <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/employer-title_component.php' ?>

                

                <ul class="navbar-nav ms-auto">
                <a class="nav-link fw-bold d-flex" href="#"
                               >
                               <?= $_SESSION['user']->full_name ?>
                                <!-- <i class="fas fa-user me-2"></i>Viktor Sunset -->
                                <div class="rounded-circle border d-flex justify-content-center align-items-center"
         style="width:30px;height:30px;margin-left:10px;"
      alt="Avatar">
    <i class="fas fa-user text-info"></i>
    </div>
                            </a>
                            
                    </ul>
            </nav>