const App = {
    data() {
        return {
            isToggledNavbar: '',
            showAlertWarning: false,
            showSuccessAlert: false,

            vacancies: [],
            employers: [],
            // vacancyName: '',
            
        }
    },
    methods: {
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        // async renderVacancies(){
        //     this.vacancies = await Vacancy.getVacancies();
        // },
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
        },
        
    },
    created(){
        this.renderEmployers();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  