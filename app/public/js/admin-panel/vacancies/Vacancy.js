class Vacancy{
    static async getVacancies(employer_id){
        let route = '/app/controllers/admin-panel/vacancies/getVacanciesEmployer.php';
        let result = await postDataResponse(route, employer_id);
        return result;
    }
    static async getVacancy(vacancy_id){
        let route = '/app/controllers/admin-panel/vacancies/getVacancy.php';
        let result = await postDataResponse(route, vacancy_id);
        return result;
    }
    static async editVacancy(data){
        let route = '/app/controllers/employer-panel/vacancies/editVacancy.php';

        let result = await postDataResponse(route, data);
        return result;
    }
}