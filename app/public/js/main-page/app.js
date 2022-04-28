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
    },
    created: function(){
        this.getCategories(this.count_categories);
    }
}
const app = Vue.createApp(App);
app.mount('#app');
