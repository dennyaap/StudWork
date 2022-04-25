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
    static async checkErrorsAuthEmployer(email, password){
        let errors = [];

        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        
        if(email == '' || password == ''){
            errors.push('Введите логин и пароль')
        }
        else if(!email.match(mailformat)){
            errors.push('Неправильно введен E-mail. Пример: email@example.com')
        }
        else if(!await Autorisation.authEmployer(email, password)){
            errors.push('Неверный логин или пароль');
        }
        return errors;
    }
    static async checkErrorsAuth(email, password){
        let errors = [];

        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        
        if(email == '' || password == ''){
            errors.push('Введите логин и пароль')
        }
        else if(!email.match(mailformat)){
            errors.push('Неправильно введен E-mail. Пример: email@example.com')
        }
        else if(!await Autorisation.authUser(email, password)){
            errors.push('Неверный логин или пароль');
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
    static async checkErrorsRegistration(fullName, email, password, gender){
        let errors = [];

        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let fullNameFormat = /[А-Яа-я]*?\s[А-Яа-я]*?\s[А-Яа-я]*/;
        
        
        if(fullName == ''){
            errors.push('Введите ФИО');
        }
        else if(!fullName.match(fullNameFormat)){
            errors.push('Некорректно введенно ФИО')
        }
        else if(email == '' || password == ''){
            errors.push('Введите E-mail и пароль');
        }
        else if(!email.match(mailformat)){
            errors.push('Неправильно введен E-mail. Пример: email@example.com')
        }
        else if(password.length <= 8){
            errors.push('Пароль должен содержать не менее 8 символов')
        }
        else if(await Registration.searchStudent(fullName, email, password, gender)){
            errors.push('Пользователь с таким E-mail уже существует')
        }
        return errors;
    }
    static async checkErrorsRegistrationEmployer(full_name, email, nameOrganization, phone, password, gender){
        let errors = [];

        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let fullNameFormat = /[А-Яа-я]*?\s[А-Яа-я]*?\s[А-Яа-я]*/;
        
        if(full_name == ''){
            errors.push('Введите ФИО');
        }
        else if(!full_name.match(fullNameFormat)){
            errors.push('Некорректно введенно ФИО')
        }
        else if(nameOrganization == ''){
            errors.push('Введите название организации');
        }
        else if(phone == ''){
            errors.push('Введите номер телефона');
        }
        else if(email == '' || password == ''){
            errors.push('Введите E-mail и пароль');
        }
        else if(!email.match(mailformat)){
            errors.push('Неправильно введен E-mail. Пример: email@example.com')
        }
        else if(password.length <= 8){
            errors.push('Пароль должен содержать не менее 8 символов')
        }
        else if(await Registration.searchEmployer(full_name, nameOrganization, phone, email, password, gender)){
            errors.push('Пользователь с таким E-mail уже существует')
        }
        return errors;
    }
}