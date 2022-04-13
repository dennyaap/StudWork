class Language{
    static async checkLanguage(name){
        let route = '/app/controllers/admin-panel/languages/checkLanguage.php';

        let result = await postDataResponse(route, name);
        return result;
    }
    static async findLanguage(id){
        let route = '/app/controllers/admin-panel/languages/findLanguage.php';

        let result = await postDataResponse(route, id);
        return result;
    }
    static async editLanguage(language){
        let route = '/app/controllers/admin-panel/languages/editLanguage.php';

        await postData(route, language);
    }
    static async deleteLanguage(id){
        let route = '/app/controllers/admin-panel/languages/deleteLanguage.php';

        await postData(route, id);
    }
}