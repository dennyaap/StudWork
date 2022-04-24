class Vacancy{
    static async getVacancies(){
        let route = '/app/controllers/vacancies/getVacancies.php';

        let result = await getData(route);
        return result;
    }
}