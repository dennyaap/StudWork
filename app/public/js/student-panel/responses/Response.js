class Response{
    static async getResponse(vacancy_id){
        let route = '/app/controllers/student-panel/responses/getResponse.php';
        let res = await postDataResponse(route, vacancy_id);
        return res;
    }
}