const App = {
    data() {
        return {
            isToggledNavbar: false,
            nameLanguage: '',
            showAlertSuccessElement: false,
            languages: [],
            selectLanguage: '',
            languageNameEdit: '',
            showSuccessAlertEdit: false,
            dangerAlertContainerCreate: '',
            dangerAlertContainerEdit: '',
            languageNameDelete: '',
        }
    },
    methods: {
        //создание категории
        async renderLanguages(data = null)
        {
            let routeGetData = '/app/controllers/admin-panel/languages/getLanguages.php';
            let routePostData = '/app/controllers/admin-panel/languages/createLanguage.php';

            if(data){
                await postData(routePostData, data);
            } 
            this.languages = await getData(routeGetData);
        },
        async addLanguage(){
            let error = await Validation.checkValidationLanguage(this.nameLanguage);
            if(error.length !== 0){
                this.showDangerAlertContainer = true;
                this.dangerAlertContainerCreate = Alert.createDangerAlert(error);
            } 
            else 
            {
                let nameLanguage = this.nameLanguage;
                this.showAlertSuccessElement = true;
                this.dangerAlertContainerCreate = '';
                setTimeout(()=> this.showAlertSuccessElement = false, 1000);
                this.nameLanguage = '';

                await this.renderLanguages(nameLanguage);
            }
        },
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        //редактирование категории
        async showEditLanguage(e){
            this.selectLanguage = await this.getSelectLanguage(e);
            this.languageNameEdit = this.selectLanguage.name;
        },
        async showDeleteLanguage(e){
            this.selectLanguage = await this.getSelectLanguage(e);
            this.languageNameDelete = this.selectLanguage.name;
        },
        async getSelectLanguage(e){
            return await Language.findLanguage(e.target.closest('.language-id').dataset.id);
        },
        async acceptEditLanguage(){
            let error = await Validation.checkEditValidation(this.languageNameEdit);
            if(error.length !== 0){
                this.dangerAlertContainerEdit = Alert.createDangerAlert(error);
            } else {
                await Language.editLanguage({'id' : this.selectLanguage.id, 'name' : this.languageNameEdit});
                
                this.showSuccessAlertEdit = true;
                setTimeout(()=>  this.showSuccessAlertEdit = false, 1000);
                this.dangerAlertContainerEdit = '';
                this.renderLanguages();
            }
        },
        async acceptDeleteLanguage(){
            await Language.deleteLanguage(this.selectLanguage.id);
            this.renderLanguages();
        }
    },
    created: function(){
        this.renderLanguages();
    }
}
const app = Vue.createApp(App);
app.mount('#app');
