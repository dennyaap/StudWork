const App = {
    data() {
        return {
            vacancies: [],
            isActive: false,
        }
    },
    methods: {
        async renderVacancies(){
            this.vacancies = await Vacancy.getVacancies();
        },
        getSalary(salary){
            return Number(salary).toLocaleString();
        },
        hide(){
            this.isActive = !this.isActive;
        },
        goVacancyPage(e){
            let vacancy_id = e.target.closest('.vacancy-card').dataset.vacancy_id;
            let route = '/app/controllers/vacancy-page/?vacancy_id=' + vacancy_id;
            window.location.href = route;
        }
    },
    created(){
       this.renderVacancies();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  