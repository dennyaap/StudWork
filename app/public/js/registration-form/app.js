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
        gender: 'м'
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
    changeAuthMode(){
      this.authMode = !this.authMode;
    }
  }
}
const app = Vue.createApp(App);
app.mount('#app');