class Status{
    static async getStatuses(){
        let route = '/app/controllers/employer-panel/responses/getStatuses.php';
        let result = await getData(route);
        return result;
    }
}