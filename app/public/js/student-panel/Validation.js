class Validation{
    static checkErrors(phone, about){
        let errors = [];
        let phoneFormat = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/;
        if(phone == ''){
            errors.push('Введите номер телефона');
        }
        else if(!phone.match(phoneFormat)){
            errors.push('Некорректный формат телефона. Пример:  +7 777 77 77 777');
        }
        else if(about == ''){
            errors.push('Введите описание резюме');
        }
        return errors;
    }
}