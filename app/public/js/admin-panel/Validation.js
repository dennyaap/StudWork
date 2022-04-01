class Validation{
    //проверка на существовании такого названия
    static async checkValidation(element){
        let errors = [];
        let categoryName = element.value;
        let result = await Category.checkCategory(categoryName);
       
        if(categoryName == ''){
            errors.push('Заполните поле!')
        }
        else if(result){
            errors.push('Данная категория уже существует!')
        }
        return errors;
    }
}