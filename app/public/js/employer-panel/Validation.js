class Validation{
    static checkErrors(vacancyName, description){
        let errors = [];
        if(vacancyName == ''){
            errors.push('Введите название вакансии');
        }
        else if(description == ''){
            errors.push('Введите описание вакансии')
        }
        console.log(errors);
        return errors;
    }
}