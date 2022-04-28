const App = {
    data() {
        return {
            vacancies: [],
            isActive: false,
        }
    },
    methods: {
        async renderVacancies(number_page = 1){
            this.vacancies = await Vacancy.getVacanciesLimit(number_page);
        },
        getSalary(salary){
            return Number(salary).toLocaleString();
        },
        getDescription(description, maxLength){
            let result = description;
            if(description.length > maxLength){
                result = description.slice(0, maxLength) + '...';
            }
            return result;
        },
        hide(){
            this.isActive = !this.isActive;
        },
        goVacancyPage(e){
            let vacancy_id = e.target.closest('.vacancy-card').dataset.vacancy_id;
            let route = '/app/controllers/vacancy-page/?vacancy_id=' + vacancy_id;
            window.location.href = route;
        },
        async changePage(value){
            let number_page = Number(this.getNumberPage()) + value;
            let route = '/app/controllers/vacancies?number_page=' + number_page;
            window.location.href = route;
        },
        getNumberPage(){
            let param = window.location.search;
            return param.split('=')[1];
        }
    },
    created(){
        let number_page = this.getNumberPage();
        this.renderVacancies(number_page);
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  