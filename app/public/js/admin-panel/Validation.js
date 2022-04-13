class Validation{
    //проверка на существовании такого названия
    static async checkValidation(name){
        let errors = [];
        let categoryName = name;
        let result = await Category.checkCategory(categoryName);
        
        if(categoryName == ''){
            errors.push('Заполните поле!')
        }
        else if(result){
            errors.push('Данная категория уже существует!')
        }
        return errors;
    }
    static async checkEditValidation(name){
        let error = '';
       
        if(name == ''){
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
    static async checkValidationSkill(name){
        let errors = [];
        let skillName = name;
        let result = await Skill.checkSkill(skillName);
       
        if(skillName == ''){
            errors.push('Заполните поле!')
        }
        else if(result){
            errors.push('Данный навык уже существует!')
        }
        return errors;
    }
    static async checkValidationLanguage(name){
        let errors = [];
        let languageName = name;
        let result = await Language.checkLanguage(languageName);
      
        if(languageName == ''){
            errors.push('Заполните поле!')
        }
        else if(result){
            errors.push('Данный язык уже существует!')
        }
        return errors;
    }
}