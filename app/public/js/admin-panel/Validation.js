class Validation{
    //проверка на существовании такого названия
    static checkValidation(element){
        let errors = [];
        let text = element.value;
        if(text == ''){
            errors.push('Заполните поле!')
        }
        return errors;
    }
}