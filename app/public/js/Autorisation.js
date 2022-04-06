class Autorisation{
    static async checkUser(email, password){
        let route = '/app/controllers/auth-form/checkUser.php';

        let result = await postDataResponse( route , { 'email' : email, 'password' : password } );
        return result;
    }
}