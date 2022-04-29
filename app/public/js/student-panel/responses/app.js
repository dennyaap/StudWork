const App = {
    data() {
        return {
            isToggledNavbar: '',

            showSuccessAlert: false,
            showWarningAlert: false,
      

            errors: [],

            responses: [],
        
            message: '',
        

            selectedVacancyId: '',

            vacancies: [],
            selectedResponse: []
        }
    },
    methods: {
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },

        getStyleStatus(status){
            let colors = ['#828EFF', '#4CD47D', '#FF9797']
            return colors[status - 1];
        },
        async renderVacancies(){
            this.vacancies = await Vacancy.getVacanciesStudent();
            if(this.vacancies.length == 0){
                this.showWarningAlert = true;
            } else {
                this.showWarningAlert = false;
            }
        },
        async getResponse(e){
            this.selectedVacancyId = e.target.closest('.vacancy-card').dataset.id;
            this.selectedResponse = await Response.getResponse(this.selectedVacancyId);
            this.message = this.selectedResponse.message;
            console.log(this.selectedVacancyId);
        }
    },
    created(){
        this.renderVacancies();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  