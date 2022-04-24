class Validation{
    static checkErrors(vacancyName, categoryName, nameOrganization, desctription){
        let errors = [];
        if(vacancyName == ''){
            errors.push('Введите название вакансии');
        }
        else if (nameOrganization == ''){
            errors.push('Введите название организации');
        }
        else if (categoryName == ''){
            errors.push('Введите название Категории');
        }
        else if(desctription == ''){
            errors.push('Введите описание вакансии')
        }
        return errors;
    }
}