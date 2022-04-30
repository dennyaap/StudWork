const App = {
    data() {
        return {
            categories: [],
            count_categories: 9
        }
    },
    methods: {
        async getCategories(count_categories){
            let route = '/app/controllers/main-page/getCountVacancies.php';
            this.categories =  await postDataResponse(route, count_categories);
        },
        getDeclinationWord(count_vacancies){
            n = Math.abs(count_vacancies) % 100;
            let declination = '';

            if (n >= 5 && n <= 20) {
                declination = 'ий';
              }
              n %= 10;
              if (n === 1) {
                declination = 'ия';
              }
              if (n >= 2 && n <= 4) {
                declination = 'ии';
              }
            return declination;
        }
    },
    created: function(){
        this.getCategories(this.count_categories);
    }
}
const app = Vue.createApp(App);
app.mount('#app');
