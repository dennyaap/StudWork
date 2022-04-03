class Category{
    static async checkCategory(name){
        let route = '/app/controllers/categories/checkCategory.php';

        let result = await postData(route, name);
        return result;
    }
    static async findCategory(id){
        let route = '/app/controllers/categories/findCategory.php';

        let result = await postDataResponse(route, id);
        return result;
    }
    static async editCategory(category){
        let route = '/app/controllers/categories/editCategory.php';

        await postData(route, category);
    }
    static async deleteCategory(id){
        let route = '/app/controllers/categories/deleteCategory.php';

        await postData(route, id);
    }
}