<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-user-secret me-2"></i>StudWork</div>
    <div class="list-group list-group-flush my-3">
        <?php foreach ($routes as $route) : ?>
            <a href="<?= $route['link'] ?>" class="list-group-item list-group-item-action bg-transparent second-text <?php if ($route['name'] == $title) : ?>active<?php endif ?>"><i class="fas <?= $route['icon'] ?> me-2"></i><?= $route['name'] ?></a>
        <?php endforeach ?>
        <a href="index.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i class="fas fa-arrow-left me-2"></i>Выйти</a>
     </div>
</div>