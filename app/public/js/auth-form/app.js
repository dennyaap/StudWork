const App = {
    data() {
        return {
          studentEmail: '',
          studentPassword: '',
          studentDangerAlertContainer: '',
          showStudentLoader: false,
          showStudentBtnText: true,
          errors: [],
          dangerAlertStudentContainer: false,
          authMode: false
        }
    },
    methods: {
      async checkAuth(e){
        e.preventDefault();
      
        this.isLoader(true);
  
        let userEmail = this.studentEmail;
        let userPassword = this.studentPassword;
  
        this.errors = await Validation.checkErrorsAuth(userEmail, userPassword);
    
        if(this.errors.length != 0){
            this.dangerAlertStudentContainer = true
        } else {
            document.location.href = "/";
        }
  
        this.isLoader(false);
      },
      isLoader(flag){
        if(flag){
          this.showStudentBtnText = false;
          this.showStudentLoader = true;
        } else {
          this.showStudentBtnText = true;
          this.showStudentLoader = false;
        }
      },
      changeAuthMode(){
        this.authMode = !this.authMode;
      }
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  