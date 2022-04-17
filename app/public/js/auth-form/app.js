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
          authMode: false,
          employerEmail: '',
          employerPassword: '',
          employerDangerAlertContainer: '',
          showEmployerLoader: false,
          showEmployerBtnText: true,
          errorsEmployer: [],
          dangerAlertEmployerContainer: false,
          authMode: false
        }
    },
    methods: {
      async checkAuth(e){
        e.preventDefault();
      
        this.isStudentLoader(true);
  
        let userEmail = this.studentEmail;
        let userPassword = this.studentPassword;
  
        this.errors = await Validation.checkErrorsAuth(userEmail, userPassword);
    
        if(this.errors.length != 0){
            this.dangerAlertStudentContainer = true
        } else {
            document.location.href = "/";
        }
  
        this.isStudentLoader(false);
      },
      isStudentLoader(flag){
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
      },
      async checkAuthEmployer(e){
        e.preventDefault();
      
        this.isEmployerLoader(true);
  
        let userEmail = this.employerEmail;
        let userPassword = this.employerPassword;
  
        this.errorsEmployer = await Validation.checkErrorsAuthEmployer(userEmail, userPassword);
    
        if(this.errorsEmployer.length != 0){
            this.dangerAlertEmployerContainer = true
        } else {
            document.location.href = "/";
        }
  
        this.isEmployerLoader(false);
      },
      isEmployerLoader(flag){
        if(flag){
          this.showEmployerBtnText = false;
          this.showEmployerLoader = true;
        } else {
          this.showEmployerBtnText = true;
          this.showEmployerLoader = false;
        }
      },
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  