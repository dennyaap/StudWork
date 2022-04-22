class Vacancy{
    static async addVacancy(vacancy){
        let route = '/app/controllers/employer-panel/create-vacancy/addVacancy.php';
        await postData(route, vacancy);
    }
}