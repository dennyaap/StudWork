const App = {
    data() {
        return {
            vacancies: [],
            isToggledNavbar: '',

            vacancyNameEdit: '',
            caregoryDeleteId: '',
            selectedVacancy: ''
        }
    },
    methods: {
        async renderVacancies(){
            this.vacancies = await Vacancy.getVacanciesEmployer();
        },
        async showDeleteCategory(e){
            this.selectedVacancy = await Vacancy.getVacancy(e.target.closest('.vacancy-id').dataset.id);
            console.log(this.selectedVacancy);
        },
        async acceptDeleteVacancy(){
            await Vacancy.deleteVacancy(this.selectedVacancy.id);
            this.renderVacancies();
        },
        async getSelectCategory(vacancy_id){
            return await Vacancy.getVacancy(vacancy_id);
        },
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
    
    },
    created(){
        this.renderVacancies();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  