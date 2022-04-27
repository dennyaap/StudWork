const App = {
    data() {
        return {
            categories: []
        }
    },
    methods: {
        async getCategories(){
            let route = '/app/controllers/main-page/getCountVacancies.php';
            this.categories =  await getData(route);
        },
    },
    created: function(){
        this.getCategories();
    }
}
const app = Vue.createApp(App);
app.mount('#app');
