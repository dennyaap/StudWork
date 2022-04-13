class Validation{
    //проверка на существовании такого названия
    static async checkValidation(text){
        let errors = [];
        let categoryName = text;
        let result = await Category.checkCategory(categoryName);
        console.log(text);
        if(categoryName == ''){
            errors.push('Заполните поле!')
        }
        else if(result){
            errors.push('Данная категория уже существует!')
        }
        return errors;
    }
    static async checkEditValidation(categoryName){
        let error = '';
       
        if(categoryName == ''){
            error ='Заполните поле!';
        }
        return error;
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
        else if(!await Autorisation.checkUser(email, password)){
            errors = 'Неверный логин или пароль';
        }
        return errors;
    }
}