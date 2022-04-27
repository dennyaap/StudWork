class Validation{
    static checkErrors(vacancyName, desctription){
        let errors = [];
        if(vacancyName == ''){
            errors.push('Введите название вакансии');
        }
        else if(desctription == ''){
            errors.push('Введите описание вакансии')
        }
        console.log(errors);
        return errors;
    }
}