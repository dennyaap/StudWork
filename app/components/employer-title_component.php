<i class="fas <?php foreach ($routes as $route) : ?><?php if ($route['name'] == $title) : ?><?= $route['icon'] ?><?php endif ?><?php endforeach ?> primary-text fs-3 me-3" id="menu-toggle" @click="toggledNavbar"></i>
    <div class="d-flex align-items-center" @click="toggledNavbar">
    <h2 class="fs-3 m-0"><?= $title ?></h2>
</div>