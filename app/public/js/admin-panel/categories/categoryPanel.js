const App = {
    data() {
        return {
            isToggledNavbar: false,
            nameCategory: '',
            paletteColor: '#828EFF',
            showAlertSuccessElement: false,
            categories: [],
            selectCategory: '',
            categoryNameEdit: '',
            paletteColorEdit: '#828EFF',
            showSuccessAlertEdit: false,
            dangerAlertContainerCreate: '',
            dangerAlertContainerEdit: '',
            categoryNameDelete: '',
        }
    },
    methods: {
        //создание категории
        async renderCategories(data = null)
        {
            let routeGetData = '/app/controllers/admin-panel/categories/getCategories.php';
            let routePostData = '/app/controllers/admin-panel/categories/createCategory.php';

            if(data){
                await postData(routePostData, data);
            } 
            this.categories = await getData(routeGetData);
        },
        async addCategory(){
            let error = await Validation.checkValidation(this.nameCategory);
            if(error.length !== 0){
                this.showDangerAlertContainer = true;
                this.dangerAlertContainerCreate = Alert.createDangerAlert(error);
            } 
            else 
            {
                let nameCategory = this.nameCategory;
                this.showAlertSuccessElement = true;
                this.dangerAlertContainerCreate = '';
                setTimeout(()=> this.showAlertSuccessElement = false, 1000);
                this.nameCategory = '';

                await this.renderCategories({'name' : nameCategory, 'color' : this.paletteColor});
            }
        },
        toggledNavbar(){
            this.isToggledNavbar = !this.isToggledNavbar;
        },
        //редактирование категории
        async showEditCategory(e){
            this.selectCategory = await this.getSelectCategory(e);
            this.categoryNameEdit = this.selectCategory.name;
            this.paletteColorEdit = this.selectCategory.color;
        },
        async showDeleteCategory(e){
            this.selectCategory = await this.getSelectCategory(e);
            this.categoryNameDelete = this.selectCategory.name;
        },
        async getSelectCategory(e){
            return await Category.findCategory(e.target.closest('.category-id').dataset.id);
        },
        async acceptEditCategory(){
            let error = await Validation.checkEditValidation(this.categoryNameEdit);
            console.log(this.paletteColorEdit)
            if(error.length !== 0){
                console.log(Alert.createDangerAlert(error));
                this.dangerAlertContainerEdit = Alert.createDangerAlert(error);
                
            } else {
                await Category.editCategory({'id' : this.selectCategory.id, 'name' : this.categoryNameEdit, 'color' : this.paletteColorEdit});
                
                this.showSuccessAlertEdit = true;
                setTimeout(()=>  this.showSuccessAlertEdit = false, 1000);
                this.dangerAlertContainerEdit = '';
                this.renderCategories();
            }
        },
        async acceptDeleteCategory(){
            await Category.deleteCategory(this.selectCategory.id);
            this.renderCategories();
        }
    },
    created: function(){
        this.renderCategories();
    }
}
const app = Vue.createApp(App);
app.mount('#app');
