const App = {
    data() {
        return {
            isToggledNavbar: false,
            nameSkill: '',
            showAlertSuccessElement: false,
            skills: [],
            selectSkill: '',
            skillNameEdit: '',
            showSuccessAlertEdit: false,
            dangerAlertContainerCreate: '',
            dangerAlertContainerEdit: '',
            skillNameDelete: '',
        }
    },
    methods: {
        //создание категории
        async renderSkills(data = null)
        {
            let routeGetData = '/app/controllers/admin-panel/skills/getSkills.php';
            let routePostData = '/app/controllers/admin-panel/skills/createSkill.php';

            if(data){
                await postData(routePostData, data);
            } 
            this.skills = await getData(routeGetData);
        },
        async addSkill(){
            let error = await Validation.checkValidationSkill(this.nameSkill);
            if(error.length !== 0){
                this.showDangerAlertContainer = true;
                this.dangerAlertContainerCreate = Alert.createDangerAlert(error);
            } 
            else 
            {
                let nameSkill = this.nameSkill;
                this.showAlertSuccessElement = true;
                this.dangerAlertContainerCreate = '';
                setTimeout(()=> this.showAlertSuccessElement = false, 1000);
                this.nameSkill = '';

                await this.renderSkills(nameSkill);
            }
        },
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        //редактирование категории
        async showEditSkill(e){
            this.selectSkill = await this.getSelectSkill(e);
            this.skillNameEdit = this.selectSkill.name;
        },
        async showDeleteSkill(e){
            this.selectSkill = await this.getSelectSkill(e);
            this.skillNameDelete = this.selectSkill.name;
        },
        async getSelectSkill(e){
            return await Skill.findSkill(e.target.closest('.skill-id').dataset.id);
        },
        async acceptEditSkill(){
            let error = await Validation.checkEditValidationSkill(this.skillNameEdit);
            console.log(this.paletteColorEdit)
            if(error.length !== 0){
                console.log(Alert.createDangerAlert(error));
                this.dangerAlertContainerEdit = Alert.createDangerAlert(error);
                
            } else {
                await Skill.editSkill({'id' : this.selectSkill.id, 'name' : this.skillNameEdit});
                
                this.showSuccessAlertEdit = true;
                setTimeout(()=>  this.showSuccessAlertEdit = false, 1000);
                this.dangerAlertContainerEdit = '';
                this.renderSkills();
            }
        },
        async acceptDeleteSkill(){
            await Skill.deleteSkill(this.selectSkill.id);
            this.renderSkills();
        }
    },
    created: function(){
        this.renderSkills();
    }
}
const app = Vue.createApp(App);
app.mount('#app');
