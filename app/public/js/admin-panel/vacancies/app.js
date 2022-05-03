const App = {
    data() {
        return {
            isToggledNavbar: '',
            showAlertWarning: false,
            showSuccessAlert: false,
            isActive: false,

            vacancies: [],
            employers: [],
            selectedVacancy: [],
            showAlertWarning: false,
            currentSalary: '',
            current_description: '',
            graphList: [],
            categories: [],
            selectedGraph: 1,
            selectedCategory: {},
            errors: [],
            vacancyNameEdit: '',
            searchBox: '',
            // vacancyName: '',
            
        }
    },
    methods: {
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        async renderVacancies(){
            this.vacancies = await Vacancy.getVacancies();
        },
        // async selectVacancy(e){
        //     let vacancy_id = e.target.closest('.vacancy-card').dataset.id;
        //     this.vacancies = await Vacancy.getVacancies(vacancy_id);
        // },
        async renderEmployers(){
            this.employers = await Employer.getEmployers();
        },
        getDate(date){
            let currentDate = date.split('-');
            let day = currentDate[2];
            let month = currentDate[1];
            let year = currentDate[0];
            return `${day}.${month}.${year}`;
        },
        async selectEmployer(e){
            let employer_id = e.target.closest('.employer-card').dataset.id;
            this.vacancies = await Vacancy.getVacancies(employer_id);
            if(this.vacancies.length == 0){
                this.showAlertWarning = true;
            } else {
                this.showAlertWarning = false;
            }
        },
        async selectVacancy(e){
            let vacancy_id = e.target.closest('.vacancy-card').dataset.id;
            this.selectedVacancy = await Vacancy.getVacancy(vacancy_id);
            this.currentSalary = this.selectedVacancy.salary;
            this.vacancyNameEdit = this.selectedVacancy.name;
            this.current_description = this.selectedVacancy.description;
            this.renderCategories();
        },
        async renderGraphs(){
            this.graphList = await Graph.getGraphs();
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
        this.renderEmployers();
        this.renderGraphs();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  