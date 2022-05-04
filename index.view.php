<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/header_component.php' ?>


<div id="app">
    <div class="categories">
        <div class="container">
            <div class="categories-container">
            <h2 class="categories-title">Популярные категории</h2>
                <div class="row row-cols-1 row-cols-md-3 g-4" id="categoriesContainer">
                    <div class="col" v-for="category in categories">
                        <div class="card category-card" :id="category.id">
                            <div class="category-color" :style="{background: category.color}"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{ category.name }}</h5>
                                <div class="salary">
                                    {{ category.minSalary }} — {{ category.maxSalary }} руб.
                                </div>
                                <p class="card-text">{{ category.countVacancies }} ваканс{{ getDeclinationWord(category.countVacancies) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/app/components/footer_component.php' ?>
</div>

<script src="https://unpkg.com/vue@next"></script>
<script src="/app/public/js/fetch.js"></script>
<script src="/app/public/js/main-page/app.js"></script>