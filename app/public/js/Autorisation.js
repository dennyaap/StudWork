class Autorisation{
    static async authUser(email, password){
        let route = '/app/controllers/auth-form/authStudent.php';

        let result = await postDataResponse( route , { 'email' : email, 'password' : password } );
        return result;
    }
    static async authEmployer(email, password){
        let route = '/app/controllers/auth-form/authEmployer.php';

        let result = await postDataResponse( route , { 'email' : email, 'password' : password } );
        return result;
    }
}