class Validation{
    static checkErrors(phone, about){
        let errors = [];
        if(phone == ''){
            errors.push('Введите номер телефона');
        }
        else if(about == ''){
            errors.push('Введите описание резюме');
        }
        return errors;
    }
}