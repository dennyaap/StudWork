const App = {
    data() {
        return {
            vacancies: [],
            isActive: false,
            currentPage: '',
            like_word: '',
            countPages: '',

        }
    },
    methods: {
        async renderVacancies(){;
            this.vacancies = await Vacancy.getVacanciesLimit({'number_page': (this.currentPage - 1) * 10, 'like_word': '%' + this.like_word + '%'});
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
            if(number_page >= 1){
                let route = '/app/controllers/vacancies?number_page=' + number_page;
                window.location.href = route;
            }
        },
        getNumberPage(){
            let param = window.location.search;
            return param.split('=')[1];
        },
        async getCountPages(){
            let result = await Vacancy.getCountVacancies();
            this.countPages = Math.ceil(result.count_vacancies / 10);
        },
        getDate(date){
            let currentDate = date.split('-');
            console.log(currentDate);
            let day = currentDate[2];
            let month = currentDate[1];
            let year = currentDate[0];
            return `${day}.${month}.${year}`;
        }
    },
    created(){
        this.currentPage = this.getNumberPage();
        this.renderVacancies();
        this.getCountPages();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  