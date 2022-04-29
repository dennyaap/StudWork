const App = {
    data() {
        return {
            vacancy: {},
            resumeList: [],
            selectedResumeId: '',
            currentVacancyId: '',
            statusResponse: 1,
            showSuccessAlert: false,
            showDangerAlert: false,
        }
    },
    methods: {
        async getVacancy(vacancy_id){
            this.vacancy = await Vacancy.getVacancy(vacancy_id);
        },
        getSalary(salary){
            return Number(salary).toLocaleString();
        },
        feedback(){
            console.log('yes');
        },
        selectResume(e){
            this.selectedResumeId = e.target.closest('.resume-card').dataset.id;
        },
        async renderResumeStudent(){
            this.resumeList = await Resume.getResumeStudent();
            this.selectedResumeId = this.resumeList[0].id;
        },
        async sendResume(){
            if(!await Validation.checkResume(this.currentVacancyId)){
                await Resume.sendResume({'resume_id': this.selectedResumeId, 'vacancy_id': this.currentVacancyId, 'status': this.statusResponse});
                this.showSuccessAlert = true;
            }
            else {
                this.showDangerAlert = true;
            }
        },
    },
    created(){
        
        let param = window.location.search;
        this.currentVacancyId = param.split('=')[1];
        this.getVacancy(this.currentVacancyId)
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  