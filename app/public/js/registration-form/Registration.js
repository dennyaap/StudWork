class Registration{
    static async checkUser(email, password){
        let route = '/app/controllers/registration-form/registationUser.php';
        
        await postData( route , { 'email' : email, 'password' : password } );
    }
    // static async isAutorisation(email){
    //     let route = '/app/controllers/auth-form/isAutorisation.php';
    //     await postData(route , email);
    // }
}