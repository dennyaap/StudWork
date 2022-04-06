class Validation{
    //проверка на существовании такого названия
    static async checkValidation(element){
        let errors = [];
        let categoryName = element.value;
        let result = await Category.checkCategory(categoryName);
       
        if(categoryName == ''){
            errors.push('Заполните поле!')
        }
        else if(result){
            errors.push('Данная категория уже существует!')
        }
        return errors;
    }
    static async checkErrorsAuth(email, password){
        let errors = [];
        
        if(email == '' || password == ''){
            errors.push('Введите логин и пароль');
        }
        else if(password <= 8){
            errors.push('Пароль должен содержать минимум 8 символов')
        }
        else if(!await Autorisation.checkUser(email, password)){
            errors.push('Неверный логин или пароль');
        }
        return errors;
    }
}