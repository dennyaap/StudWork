const App = {
    data() {
        return {
            vacancies: [],
            isToggledNavbar: '',

            vacancyNameEdit: '',
            caregoryDeleteId: '',
            selectedVacancy: '',

            graphList: [],
            selectedGraph: 1,

            isActive: false,
            
            categories: [],
            selectedCategory: {},
            searchBox: '',

            currentSalary: '',

            showSuccessAlert: false,

            current_description: '',

            errors: [],

        }
    },
    methods: {
        async renderVacancies(){
            this.vacancies = await Vacancy.getVacanciesEmployer();
        },
        async showDeleteVacancy(e){
            this.selectedVacancy = await this.getSelectVacancy(e.target.closest('.vacancy-id').dataset.id);
            console.log(this.selectedVacancy);
        },
        async acceptDeleteVacancy(){
            await Vacancy.deleteVacancy(this.selectedVacancy.id);
            this.renderVacancies();
        },
        async getSelectVacancy(vacancy_id){
            return await Vacancy.getVacancy(vacancy_id);
        },
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },

        async renderGraphs(){
            this.graphList = await Graph.getGraphs();
        },

        async showEditVacancy(e){
            this.selectedVacancy = await this.getSelectVacancy(e.target.closest('.vacancy-id').dataset.id);
            this.vacancyNameEdit = this.selectedVacancy.name;
            this.renderCategories();
            this.currentSalary = this.selectedVacancy.salary;
            this.current_description = this.selectedVacancy.description;
        },
        async acceptEditVacancy(){

        },

        async renderCategories(){
            // let selectedCategory = await Category.getCategoriesLimit(1);
            // this.selectedCategory.id = selectedCategory[0].id;
            // this.selectedCategory.name = selectedCategory[0].name;
            this.selectedCategory = {'id': this.selectedVacancy.category_id, 'name': this.selectedVacancy.category_name};
            console.log(this.selectedCategory);
            let countRow = 8;
            this.categories = await Category.getCategoriesLimit(countRow);
        },

        chooseCategory(e){
            this.selectedCategory.name = e.target.getAttribute('data-categoryName');
            this.selectedCategory.id = e.target.id;
            this.hideCategoryList();
        },
        hideCategoryList(){
            this.isActive = !this.isActive;
        },

        async searchLikeCategory(e){
            let word = e.target.value;
            this.categories = await Category.getLikeCategories(word);
        },
        async editVacancy(){
            this.errors = Validation.checkErrors(this.vacancyNameEdit, this.current_description);
            console.log(this.current_description);
            if(this.errors.length == 0){
                await Vacancy.editVacancy({ 'vacancy_id': this.selectedVacancy.id, 'name': this.vacancyNameEdit, 'photo': 'link', 'category_id': this.selectedCategory.id, 'salary': this.currentSalary, 'description': this.current_description, 'work_graph': this.selectedGraph });
                this.renderVacancies();
                
                this.showSuccessAlert = true;
                setTimeout(()=>  this.showSuccessAlert = false, 2000);
                
            }
            console.log(this.errors);
            
        },
    
    },
    created(){
        this.renderVacancies();
        this.renderGraphs();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  