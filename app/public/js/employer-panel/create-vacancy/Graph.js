class Graph{
    static async getGraphs(){
        let route = '/app/controllers/employer-panel/create-vacancy/getGraphs.php'
        let result = await getData(route);
        return result;
    }
}