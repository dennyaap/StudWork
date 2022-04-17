class Autorisation{
    static async authUser(email, password){
        let route = '/app/controllers/auth-form/authStudent.php';

        let result = await postDataResponse( route , { 'email' : email, 'password' : password } );
        return result;
    }
    // static async searchStudent(email){
    //     let route = '/app/controllers/auth-form/searchStudent.php';
    //     let result = await postDataResponse( route , email);
    //     return result;
    // }
    // static async isAutorisation(email){
    //     let route = '/app/controllers/auth-form/isAutorisation.php';
    //     await postData(route , email);
    // }
}