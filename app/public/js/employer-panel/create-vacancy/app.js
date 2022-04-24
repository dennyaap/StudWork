const App = {
    data() {
        return {
            isToggledNavbar: false,
            vacancyName: '',
            nameOrganization: '',
            categoryName: '',
            selectedCategoryName: 'WEB-Разработчик',
            selectedCategoryId: 1,
            isActive: false,
            searchBox: '',
            
            categories: [],
            
            currentSalary: 10000,
            
            graphList: [],
            selectedGraph: 1,
        }
    },
    methods: {
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        async renderCategories(){
            let countRow = 8;
            this.categories = await Category.getCategoriesLimit(countRow);
        },
        chooseCategory(e){
            this.selectedCategoryName = e.target.getAttribute('data-categoryName');
            this.selectedCategoryId = e.target.id;
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
            let errors = Validation.checkErrors(this.vacancyName, this.selectedCategoryName, this.nameOrganization);

            if(errors.length != 0){
                console.log(errors);
            }
            else{
                await Vacancy.addVacancy({ 'name': this.vacancyName, 'photo': 'link', 'category_id': this.selectedCategoryId, 'salary': this.currentSalary, 'about': this.about, 'work_graph': this.selectedGraph })
                console.log('Успешно добавлена...');
            }
        }
        
    },
    created(){
        this.renderCategories();
        this.renderGraphList();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  