class Validation{
    static checkErrors(vacancyName, description, file){
        let errors = [];
        if(vacancyName == ''){
            errors.push('Введите название вакансии');
        }
        else if(description == ''){
            errors.push('Введите описание вакансии')
        }
        else if (file) {
            if(!['image/jpeg', 'image/png', 'image/svg+xml'].includes(file.type)){
                errors.push('Недопустимый формат изображения. Доступные форматы: jpeg, png, svg + xml.');
            }
            else if (file.size > 10 * 1024 * 1024) {
                errors.push('Размер изображения не должен превышать 10 мб');
            }
        }
        return errors;
    }
}