const App = {
    data() {
        return {
            isToggledNavbar: '',
            showAlertWarning: false,
            showSuccessAlert: false,

            students: [],
            resumeList: [],
            selectedResume: [],
            errors: [],

            phone: '',
            about: '',
        }
    },
    methods: {
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        async renderStudents(){
            this.students = await Student.getStudents();
        },
        async selectStudent(e){
            let student_id = e.target.closest('.student-card').dataset.id;
            this.resumeList = await Resume.getResumeList(student_id);
            if(this.resumeList.length == 0){
                this.showAlertWarning = true;
            } else {
                this.showAlertWarning = false;
            }
        },
        getDate(date){
            let currentDate = date.split('-');
            let day = currentDate[2];
            let month = currentDate[1];
            let year = currentDate[0];
            return `${day}.${month}.${year}`;
        },
        async showResume(e){
            let resume_id = e.target.closest('.resume-card').dataset.id;
            this.selectedResume = await Resume.getResume(resume_id)
            this.phone = this.selectedResume.phone;
            this.about = this.selectedResume.about;
        },
        async editResume(){
            this.errors = Validation.checkErrors(this.phone, this.about);
            if(this.errors.length == 0){
                await Resume.editResume({'resume_id': this.selectedResume.id, 'phone': this.phone, 'about': this.about});
                
                this.showSuccessAlert = true;
                setTimeout(()=>  this.showSuccessAlert = false, 2000);
            }
        },
    },
    created(){
        this.renderStudents();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  