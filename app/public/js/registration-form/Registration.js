class Registration{
    static async searchStudent(full_name, email, password, gender){
        let route = '/app/controllers/registration-form/searchStudent.php';
        
        let result = await postDataResponse( route , { 'full_name' : full_name, 'email' : email, 'password' : password, 'gender' : gender });
        return result;
    }
    static async searchEmployer(full_name, nameOrganization, phone, email, password, gender){
        let route = '/app/controllers/registration-form/searchEmployer.php';
        
        let result = await postDataResponse( route , { 'full_name': full_name, 'nameOrganization': nameOrganization, 'phone': phone,'email' : email, 'password' : password, 'gender' : gender });
        return result;
    }
}