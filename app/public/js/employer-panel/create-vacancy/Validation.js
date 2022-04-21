class Validation{
    static checkErrors(vacancyName, categoryName, nameOrganization){
        let errors = [];
        if(vacancyName == ''){
            errors.push('Введите название вакансии');
        }
        else if (categoryName == ''){
            errors.push('Введите название Категории');
        }
        return errors;
    }
}