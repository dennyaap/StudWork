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
        let errors = '';

        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        
        if(email == '' || password == ''){
            errors = 'Введите логин и пароль';
        }
        else if(!email.match(mailformat)){
            errors = 'Неправильно введен E-mail. Пример: email@example.com'
        }
        else if(password.length <= 8){
            errors = 'Пароль должен содержать минимум 8 символов';
        }
        else if(!await Autorisation.checkUser(email, password)){
            errors = 'Неверный логин или пароль';
        }
        return errors;
    }
}