class Vacancy{
    static async getVacancies(employer_id){
        let route = '/app/controllers/admin-panel/vacancies/getVacanciesEmployer.php';
        let result = await postDataResponse(route, employer_id);
        return result;
    }
}