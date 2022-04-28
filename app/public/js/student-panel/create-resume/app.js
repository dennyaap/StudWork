const App = {
    data() {
        return {
            isToggledNavbar: false,
            isActive: false,
            phone: '',
            about: '',
            errors: [],

            currentDate: '',
        }
    },
    methods: {
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        
        hideCategoryList(){
            this.isActive = !this.isActive;
        },
       
        imagePreview(){

        },
        async createResume(){
            this.errors = Validation.checkErrors(this.phone, this.about);
        
            if(this.errors.length == 0){
                this.currentDate = new Date().toISOString();
                
                console.log(this.currentDate);
                await Resume.createResume({ 'phone': this.phone, 'photo': 'link', 'about': this.about, 'created_at': this.currentDate})
                this.clearLabels();
            }
            
        },
        // getSalary(salary){
        //     return Number(salary).toLocaleString();
        // },
        clearLabels(){
            this.phone = '';
            this.about = '';
        }
    },
    created(){
        
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  