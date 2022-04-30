const App = {
    data() {
        return {
            email: '',
            password: '',
            errors: [],
        }
    },
    methods: {
        async checkAuth(e){
            e.preventDefault();
            this.errors = await Validation.checkErrors(this.email, this.password);

            if(this.errors.length == 0){
                window.location.href = '/app/controllers/admin-panel/categories/';
            }
        }
    },
    created(){
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  