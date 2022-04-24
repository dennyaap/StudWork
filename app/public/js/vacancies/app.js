const App = {
    data() {
        return {
            vacancies: [],
        }
    },
    methods: {
        async renderVacancies(){
            this.vacancies = await Vacancy.getVacancies();
        },
        getSalary(salary){
            return parseFloat(salary).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1 ").replace('.', ',');
        }
    },
    created(){
       this.renderVacancies();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  