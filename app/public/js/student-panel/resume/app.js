const App = {
    data() {
        return {
            isToggledNavbar: false,
            showSuccessAlert: false,
            showWarningAlert: false,
            errors: [],

            selectedResume: {},
            resumeList: [],
            phone: '',
            about: '',
        }
    },
    methods: {
        // async renderVacancies(){
        //     this.vacancies = await Vacancy.getVacanciesEmployer();
        // },
        // async showDeleteVacancy(e){
        //     this.selectedVacancy = await this.getSelectVacancy(e.target.closest('.vacancy-id').dataset.id);
        //     console.log(this.selectedVacancy);
        // },
        // async acceptDeleteVacancy(){
        //     await Vacancy.deleteVacancy(this.selectedVacancy.id);
        //     this.renderVacancies();
        // },
        // async getSelectVacancy(vacancy_id){
        //     return await Vacancy.getVacancy(vacancy_id);
        // },
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
  

        async renderResumeStudent(){
            this.resumeList = await Resume.getResumeStudent();
            if(this.resumeList.length == 0){
                this.showWarningAlert = true;
            } else {
                this.showWarningAlert = false;
            }
        },
       async showEditResume(e){
            this.selectedResume = await this.getSelectResume(e.target.closest('.resume-id').dataset.id);
            this.phone = this.selectedResume.phone;
            this.about = this.selectedResume.about;
        },
        async showDeleteResume(){

        },
        async editResume(){
            this.errors = Validation.checkErrors(this.phone, this.about);
            if(this.errors.length == 0){
                await Resume.editResume({'resume_id': this.selectedResume.id, 'phone': this.phone, 'about': this.about});
                this.renderResumeStudent();
                
                this.showSuccessAlert = true;
                setTimeout(()=>  this.showSuccessAlert = false, 2000);
            }
        },
        async getSelectResume(resume_id){
            return await Resume.getResume(resume_id);
        },
        async acceptDeleteResume(){

        },
        showDeleteResume(e){
            this.deleteResumeId = e.target.closest('.resume-id').dataset.id;
            console.log(this.deleteResumeId)
        },
        async deleteResume(){
            await Resume.deleteResume(this.deleteResumeId);
            this.renderResumeStudent();
        },
        getDate(date){
            let currentDate = date.split('-');
            let day = currentDate[2];
            let month = currentDate[1];
            let year = currentDate[0];
            return `${day}.${month}.${year}`;
        },
    },
    created(){
        this.renderResumeStudent();
        // this.renderGraphs();
    }
  }
  const app = Vue.createApp(App);
  app.mount('#app');
  