class Category{
    static async checkCategory(name){
        let route = '/app/controllers/categories/checkCategory.php';

        let result = await postData(route, name);
        return result;
    }
    static async findCategory(id){
        let route = '/app/controllers/categories/findCategory.php';

        let result = await postData(route, id);
        return result;
    }
    static async editCategory(category){
        let route = '/app/controllers/categories/editCategory.php';

        let result = await postDataCategory(route, category);
        return result;
    }
    static async deleteCategory(id){
        let route = '/app/controllers/categories/deleteCategory.php';

        let result = await postDataCategory(route, id);
        return result;
    }
}