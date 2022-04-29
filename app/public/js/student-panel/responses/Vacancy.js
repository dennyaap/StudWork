class Vacancy{
    static async getVacanciesStudent(){
        let route = '/app/controllers/student-panel/responses/getVacanciesStudent.php';

        let result = await getData(route);
        return result;
    }
}