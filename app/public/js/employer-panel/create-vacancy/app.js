const App = {
    data() {
        return {
            isToggledNavbar: false,
            vacancyName: '',
            categoryName: '',
            selectedCategoryName: '',
            selectedCategoryId: 1,
            isActive: false,
            searchBox: '',
            description: '',
            errors: [],
            categories: [],
            
            currentSalary: 10000,
            
            graphList: [],
            selectedGraph: 1,

            currentDate: '',
        }
    },
    methods: {
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        async renderCategories(){
            this.selectedCategory = await Category.getCategoriesLimit(1);
            this.selectedCategoryId = this.selectedCategory[0].id;
            this.selectedCategoryName = this.selectedCategory[0].name;
            let countRow = 8;
            this.categories = await Category.getCategoriesLimit(countRow);
        },
        chooseCategory(e){
            this.selectedCategoryName = e.target.getAttribute('data-categoryName');
            this.selectedCategoryId = e.target.id;
            console.log(`ff: ${this.selectedCategoryId}`)
            this.hideCategoryList();
        },
        hideCategoryList(){
            this.isActive = !this.isActive;
        },
        async searchLikeCategory(e){
            let word = e.target.value;
            this.categories = await Category.getLikeCategories(word);
        },
        imagePreview(){

        },
        async renderGraphList(){
            this.graphList = await Graph.getGraphs();
        },
        async addVacancy(e){
            e.preventDefault();
            this.errors = Validation.checkErrors(this.vacancyName, this.selectedCategoryName, this.description);

            if(this.errors.length == 0){
                this.currentDate = new Date().toLocaleDateString();
                console.log(this.selectedCategoryId);
                await Vacancy.addVacancy({ 'name': this.vacancyName, 'photo': 'link', 'category_id': this.selectedCategoryId, 'salary': this.currentSalary, 'description': this.description, 'work_graph': this.selectedGraph , 'created_at': this.currentDate})
                this.clearLabels();
            }
            
        },
        getSalary(salary){
            return Number(salary).toLocaleString();
        },
        clearLabels(){
            this.vacancyName = '';
            this.name_organization = '';
            this.categoryName = '';
            this.selectedCategoryName = 'WEB-разработчик';
            this.selectedCategoryId = ''; //добавить запрос на получения первой категории
            this.description = '';
            this.selectedGraph = 1;
            this.currentSalary = 10000;
        }
    },
    created(){
         //добавить запрос на получения первой категории
        this.renderCategories();
        this.renderGraphList();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  