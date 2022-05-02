const App = {
    data() {
        return {
            vacancies: [],
            isActive: false,
            currentPage: '',
            like_word: '',
            countPages: '',
            graphList: [],
            selectedGraphs: [1, 2, 3],
        }
    },
    methods: {
        async renderVacancies(){
            this.vacancies = await Vacancy.getVacanciesLimit({'number_page': (this.currentPage - 1) * 10, 'like_word': '%' + this.like_word + '%', 'graphs': this.selectedGraphs});
            window.scrollTo(0, 0)
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
        selectPage(value){
            this.currentPage = value;
            console.log(this.currentPage);
            this.renderVacancies();
        },
        changePage(value){
            this.currentPage += value;
            this.renderVacancies();
        },
        async getCountPages(){
            let result = await Vacancy.getCountVacancies();
            this.countPages = Math.ceil(result.count_vacancies / 10);
        },
        getDate(date){
            let currentDate = date.split('-');
            let day = currentDate[2];
            let month = currentDate[1];
            let year = currentDate[0];
            return `${day}.${month}.${year}`;
        },
        async getGraphs(){
            let graphs = await Graph.getGraphs();
            graphs.forEach(item => {
                this.graphList.push(
                    {
                        'id': item.id,
                        'name': item.name,
                        'isChecked': true
                    }
                );
            });
        },
        async selectGraph(){
            this.currentPage = 1;
            this.selectedGraphs = this.graphList.filter(item => item.isChecked).map(item => item.id);
            if(this.selectedGraphs.length == 0){
                this.selectedGraphs = [1, 2, 3];
            }
            this.renderVacancies();
            // .map(item => item.id);
            // this.vacancies = await Vacancy.getVacanciesLimit({'number_page': (this.currentPage - 1) * 10, 'like_word': '%' + this.like_word + '%', 'graphs': this.selectedGraphs});
        }
    },
    created(){
        this.currentPage = 1;
        this.renderVacancies();
        this.getCountPages();
        this.getGraphs();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  