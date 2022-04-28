class Response{
    static async getResponses(){
        let route = '/app/controllers/employer-panel/responses/getResponses.php';
        let res = await getData(route);
        return res;
    }
}