class Response{
    static async getResponses(vacancy_id){
        let route = '/app/controllers/employer-panel/responses/getResponses.php';
        let res = await postDataResponse(route, vacancy_id);
        return res;
    }
}