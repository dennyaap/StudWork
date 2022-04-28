class Vacancy{
    static async getVacanciesLimit(number_page){
        let route = '/app/controllers/vacancies/getVacanciesLimit.php';
        let result = await postDataResponse(route, (number_page - 1) * 10);
        return result;
    }
}