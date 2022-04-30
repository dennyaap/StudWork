class Validation{
    static async checkErrors(email, password){
        let errors = [];
        if(email == ''){
            errors.push('Введите логин');
        } else if(password == ''){
            errors.push('Введите пароль');
        } else if(!await Auth.checkAuth({'email': email, 'password': password})){
            errors.push('Неверный логин или пароль');
        }
        return errors;
    }
}