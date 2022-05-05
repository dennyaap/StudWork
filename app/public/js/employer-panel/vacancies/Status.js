class Status{
    static async getStatuses(){
        let route = '/app/controllers/employer-panel/vacancies/getStatuses.php'
        let result = await getData(route);
        return result;
    }
    static async changeVacancyStatus(data){
        let route = '/app/controllers/employer-panel/vacancies/changeVacancyStatus.php';
        await postDataResponse(route, data);
    }
}