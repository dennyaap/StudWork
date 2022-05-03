class Employer{
    static async getEmployers(){
        let route = '/app/controllers/admin-panel/vacancies/getEmployers.php';
        let result = await getData(route);
        return result;
    }
}