class Vacancy{
    static async addVacancy(vacancy){
        let route = '/app/controllers/employer-panel/create-vacancy/addVacancy.php';
        await postDataResponse(route, vacancy);
    }
    static async getVacanciesEmployer(){
        let route = '/app/controllers/employer-panel/vacancies/getVacanciesEmployer.php';

        let result = await getData(route);
        return result;
    }
    static async deleteVacancy(vacancy_id){
        let route = '/app/controllers/employer-panel/vacancies/deleteVacancy.php';

        let result = await postDataResponse(route, vacancy_id);
        return result;
    }
    static async getVacancy(vacancy_id){
        let route = '/app/controllers/employer-panel/vacancies/getVacancy.php';

        let result = await postDataResponse(route, vacancy_id);
        return result;
    }
    static async editVacancy(data){
        let route = '/app/controllers/employer-panel/vacancies/editVacancy.php';

        let result = await postDataResponse(route, data);
        return result;
    }
    static async uploadImage(formData){
        let route = '/app/controllers/employer-panel/create-vacancy/uploadImage.php';
        let result = await postFormData(route, formData);
        return result;
    }
}