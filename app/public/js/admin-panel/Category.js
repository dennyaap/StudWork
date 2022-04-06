class Category{
    static async checkCategory(name){
        let route = '/app/controllers/admin-panel/categories/checkCategory.php';

        let result = await postDataResponse(route, name);
        return result;
    }
    static async findCategory(id){
        let route = '/app/controllers/admin-panel/categories/findCategory.php';

        let result = await postDataResponse(route, id);
        return result;
    }
    static async editCategory(category){
        let route = '/app/controllers/admin-panel/categories/editCategory.php';

        await postData(route, category);
    }
    static async deleteCategory(id){
        let route = '/app/controllers/admin-panel/categories/deleteCategory.php';

        await postData(route, id);
    }
}