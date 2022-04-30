class Auth{
    static async checkAuth(data){
        let route = '/app/controllers/auth-admin/checkAuth.php';
        let result = await postDataResponse(route, data);
        return result;
    }
}