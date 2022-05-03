class Category{
    static async getCategoriesLimit(countRow){
        let route = '/app/controllers/employer-panel/create-vacancy/getCategoriesLimit.php';

        let result = await postDataResponse(route, countRow);
        return result;
    }
    static async getLikeCategories(word){
        let route = '/app/controllers/employer-panel/create-vacancy/getLikeCategories.php';

        let result = await postDataResponse(route, word + '%');
        return result;
    }
    static async getCategory(category_id){
        let route = '/app/controllers/employer-panel/vacancies/getCategory.php';
        
        let result = await postDataResponse(route, category_id);
        return result;
    }
    static async getFirstCategory(){
        let route = '/app/controllers/employer-panel/create-vacancy/getFirstCategory.php';
        
        let result = await getData(route);
        return result;
    }
}