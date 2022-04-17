class Registration{
    static async searchStudent(name, surname, patronomyc, email, password, gender){
        let route = '/app/controllers/registration-form/searchStudent.php';
        
        let result = await postDataResponse( route , { 'name' : name, 'surname' : surname, 'patronomyc' : patronomyc, 'email' : email, 'password' : password, 'gender' : gender });
        return result;
    }
    static async searchEmployer(name, surname, patronomyc, nameOrganization, phone, email, password, gender){
        let route = '/app/controllers/registration-form/searchEmployer.php';
        
        let result = await postDataResponse( route , { 'name' : name, 'surname' : surname, 'patronomyc' : patronomyc, 'nameOrganization': nameOrganization, 'phone': phone,'email' : email, 'password' : password, 'gender' : gender });
        return result;
    }
}