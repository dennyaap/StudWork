const App = {
    data() {
        return {
            vacancies: [],
            isActive: true,
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
        }
    },
    created(){
       this.renderVacancies();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  