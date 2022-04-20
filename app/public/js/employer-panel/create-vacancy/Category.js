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
}