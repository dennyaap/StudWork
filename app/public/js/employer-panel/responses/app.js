const App = {
    data() {
        return {
            isToggledNavbar: '',

            showSuccessAlert: false,

      

            errors: [],

            responses: [],
            vacancies: [],
            showAlert: false,
            showAlertVacancies: false,

            selectedResume: {},
            statusList: [],
            selectedStatus: 1,

            message: '',
            showMessageBox: false,
            
            selectedResumeId: '',
            showAlertResponse: false,

            selectedVacancyId: '',
        }
    },
    methods: {
        // async renderVacancies(){
        //     this.vacancies = await Vacancy.getVacanciesEmployer();
        // },
        // async showDeleteVacancy(e){
        //     this.selectedVacancy = await this.getSelectVacancy(e.target.closest('.vacancy-id').dataset.id);
        //     console.log(this.selectedVacancy);
        // },
        // async acceptDeleteVacancy(){
        //     await Vacancy.deleteVacancy(this.selectedVacancy.id);
        //     this.renderVacancies();
        // },
        // async getSelectVacancy(vacancy_id){
        //     return await Vacancy.getVacancy(vacancy_id);
        // },
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },

        // async renderGraphs(){
        //     this.graphList = await Graph.getGraphs();
        // },

        // async showEditVacancy(e){
        //     this.selectedVacancy = await this.getSelectVacancy(e.target.closest('.vacancy-id').dataset.id);
        //     this.vacancyNameEdit = this.selectedVacancy.name;
        //     this.renderCategories();
        //     this.currentSalary = this.selectedVacancy.salary;
        //     this.current_description = this.selectedVacancy.description;
        // },
        // async acceptEditVacancy(){

        // },

        // async renderCategories(){
        //     // let selectedCategory = await Category.getCategoriesLimit(1);
        //     // this.selectedCategory.id = selectedCategory[0].id;
        //     // this.selectedCategory.name = selectedCategory[0].name;
        //     this.selectedCategory = {'id': this.selectedVacancy.category_id, 'name': this.selectedVacancy.category_name};
        //     console.log(this.selectedCategory);
        //     let countRow = 8;
        //     this.categories = await Category.getCategoriesLimit(countRow);
        // },

        // chooseCategory(e){
        //     this.selectedCategory.name = e.target.getAttribute('data-categoryName');
        //     this.selectedCategory.id = e.target.id;
        //     this.hideCategoryList();
        // },
        // hideCategoryList(){
        //     this.isActive = !this.isActive;
        // },

        // async searchLikeCategory(e){
        //     let word = e.target.value;
        //     this.categories = await Category.getLikeCategories(word);
        // },
        // async editVacancy(){
        //     this.errors = Validation.checkErrors(this.vacancyNameEdit, this.current_description);
        //     console.log(this.current_description);
        //     if(this.errors.length == 0){
        //         await Vacancy.editVacancy({ 'vacancy_id': this.selectedVacancy.id, 'name': this.vacancyNameEdit, 'photo': 'link', 'category_id': this.selectedCategory.id, 'salary': this.currentSalary, 'description': this.current_description, 'work_graph': this.selectedGraph });
        //         this.renderVacancies();
                
        //         this.showSuccessAlert = true;
        //         setTimeout(()=>  this.showSuccessAlert = false, 2000);
                
        //     }
        //     console.log(this.errors);
            
        // },
        async selectVacancy(e){
            this.selectedVacancyId = e.target.closest('.vacancy-card').dataset.id;
            this.renderResponses(this.selectedVacancyId);
        },
        async renderResponses(vacancy_id){
            this.showAlert = false;
            this.showAlertVacancies = false;
           
            this.responses = await Response.getResponses(vacancy_id);

            if(this.responses.length == 0){
                this.showAlert = true;
            }
            
        },
        async renderVacancies(){
            this.vacancies = await Vacancy.getVacanciesEmployer();
            if(this.vacancies.length == 0){
                this.showAlertVacancies = true;
            }
        },
        async selectResume(e){
            this.selectedResumeId = e.target.closest('.resume-card').dataset.id;
            this.selectedResume = await Resume.getResume(this.selectedResumeId);
        },
        async renderStatuses(){
            this.statusList = await Status.getStatuses();
          
        },
        checkSelectedStatus(){
            if(this.selectedStatus == 2){
                this.showMessageBox = true;
            } else {
                this.showMessageBox = false;
            }
        },
        async sendResponse(){
            await Response.sendResponse({'message': this.message, 'status': this.selectedStatus, 'resume_id': this.selectedResumeId, 'vacancy_id': this.selectedVacancyId});
            await this.renderResponses(this.selectedVacancyId);
            this.showAlertResponse = true;
            setTimeout(()=> this.showAlertResponse = false, 2000);
        },
        getStyleStatus(status){
            let colors = ['#828EFF', '#4CD47D', '#FF9797']
            return colors[status - 1];
        }
    },
    created(){
    //    this.renderResponses();
    this.renderVacancies();
    this.renderStatuses();
   
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  