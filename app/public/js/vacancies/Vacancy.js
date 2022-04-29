class Vacancy{
    static async getVacanciesLimit(data){
        let route = '/app/controllers/vacancies/getVacanciesLimit.php';
        let result = await postDataResponse(route, data);
        return result;
    }
    static async getCountVacancies(){
        let route = '/app/controllers/vacancies/getCountVacancies.php';
        let result = await getData(route);
        return result;
    }
}