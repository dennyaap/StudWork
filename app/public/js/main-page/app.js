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

            let n1 = n % 10;
            if (n > 10 && n < 20) { 
                declination = 'ий'; 
            }
            if (n1 > 1 && n1 < 5) { 
                declination = 'ии';
             }
            if (n1 == 1) { 
                declination = 'ия'; 
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
