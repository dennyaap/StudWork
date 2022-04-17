class Registration{
    static async searchStudent(name, surname, patronomyc, email, password, gender){
        let route = '/app/controllers/registration-form/searchStudent.php';
        
        let result = await postDataResponse( route , { 'name' : name, 'surname' : surname, 'patronomyc' : patronomyc, 'email' : email, 'password' : password, 'gender' : gender });
        return result;
    }
}