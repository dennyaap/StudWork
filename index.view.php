<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/header_component.php' ?>

<!-- <div class="categories">
    <div class="container">
        <div class="categories-container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-1">
                            <div class="color">ff</div>
                            </div>
                            <div class="col-md-11">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-1">
                            <div class="color">ff</div>
                            </div>
                            <div class="col-md-11">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-1">
                            <div class="color">ff</div>
                            </div>
                            <div class="col-md-11">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div id="app">
    <div class="categories">
        <a href="/app/controllers/auth-form/">auth</a>
        <a href="/app/controllers/admin-panel/categories/">admin panel</a>
        <div class="container">
            <div class="categories-container">
                <div class="row row-cols-1 row-cols-md-3 g-4" id="categoriesContainer">
                    <div class="col" v-for="category in categories">
                        <div class="card category-card" :id="category.id">
                            <div class="category-color" :style="{background: category.color}"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{category.name}}</h5>
                                <p class="card-text">smth</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/vue@next"></script>
<script src="/app/public/js/fetch.js"></script>
<script src="/app/public/js/main-page/categories.js"></script>