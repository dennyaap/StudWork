const App = {
  data() {
      return {
        studentName: '',
        studentSurname: '',
        studentPatronomyc: '',
        studentEmail: '',
        studentPassword: '',
        studentDangerAlertContainer: '',
        showStudentLoader: false,
        showStudentBtnText: true,
        errors: [],
        dangerAlertStudentContainer: false,
        authMode: false,
        gender: 'м',
        employerName: '',
        employerSurname: '',
        employerPatronomyc: '',
        employerNameOrganization: '',
        employerPhone: '',
        employerEmail: '',
        employerPassword: '',
        employerGender: 'м',
        showEmployerBtnText: true,
        showEmployerLoader: false,
        employerErrors: [],
        dangerAlertEmployerContainer: false
      }
  },
  methods: {
    async createAccount(e){
      e.preventDefault();

      this.errors = await Validation.checkErrorsRegistration(this.studentName, this.studentSurname, this.studentPatronomyc, this.studentEmail, this.studentPassword, this.gender);

      if(this.errors.length != 0){
        this.dangerAlertStudentContainer = true
      } else {
        await Autorisation.authUser(this.studentEmail, this.studentPassword);
        document.location.href = "/";
      }
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
    async createEmployerAccount(e){
      e.preventDefault();

      this.employerErrors = await Validation.checkErrorsRegistrationEmployer(this.employerName, this.employerSurname, this.employerPatronomyc, this.employerEmail, this.employerNameOrganization, this.employerPhone, this.employerPassword, this.employerGender);
      if(this.employerErrors.length != 0){
        this.dangerAlertEmployerContainer = true
      } else {
        await Autorisation.authEmployer(this.employerEmail, this.employerPassword);
        document.location.href = "/";
      }
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
    changeAuthMode(){
      this.authMode = !this.authMode;
    }
  }
}
const app = Vue.createApp(App);
app.mount('#app');