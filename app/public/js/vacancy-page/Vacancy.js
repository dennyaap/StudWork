class Vacancy{
    static async getVacancy(vacancy_id){
        let route = '/app/controllers/employer-panel/vacancies/getVacancy.php';

        let result = await postDataResponse(route, vacancy_id);
        return result;
    }
}