const App = {
    data() {
        return {
            vacancy: {},
        }
    },
    methods: {
       async getVacancy(){
            let param = window.location.search;
            let vacancy_id = param.split('=')[1];

            this.vacancy = await Vacancy.getVacancy(vacancy_id);
            console.log(this.vacancy)
       },
       getSalary(salary){
            return Number(salary).toLocaleString();
       },
       feedback(){
           console.log('yes');
       }
       
    },
    created(){
        this.getVacancy()
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  