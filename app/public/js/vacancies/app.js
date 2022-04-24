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
            return parseFloat(salary).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1 ").replace('.', ',');
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
  