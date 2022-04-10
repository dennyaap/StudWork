let categoryNameElement = document.getElementById('category-name');
let categoryNameDeleteElement = document.getElementById('category-name-delete');

let dangerAlertContainerEdit = document.getElementById('dangerAlertContainerEdit');
let textElementEdit = document.getElementById('categoryNameEdit');
let successAlertElementEdit = document.getElementById('successAlertEdit');
successAlertElementEdit.style.display = 'none';
let selectCategory = {}

async function showEditCategory(e){
        selectCategory = await getSelectCategory(e);
        textElementEdit.value = selectCategory.name;
}

async function showDeleteCategory(e){
    selectCategory = await getSelectCategory(e);
    categoryNameDeleteElement.textContent = selectCategory.name;
}

async function getSelectCategory(e){
    return await Category.findCategory(e.closest('.category-id').dataset.id);
}



let btnAccept = document.getElementById('btnAccept');

let paletteColorEditElement = document.getElementById('paletteColorEdit');

btnAccept.addEventListener('click', async () =>{
    let errors = await Validation.checkEditValidation(textElementEdit);
    if(errors.length !== 0){
        renderDangerAlert(dangerAlertContainerEdit, errors);
    } else {
        await Category.editCategory({'id' : selectCategory.id, 'name' : textElementEdit.value, 'color' : paletteColorEditElement.value});
        successAlertElementEdit.style.display = '';
        setTimeout(()=> successAlertElementEdit.style.display = 'none', 1000);
        clearElement(dangerAlertContainerEdit);
        renderCategories();
    }
})

let btnDeleteCategory = document.getElementById('btnDeleteCategory')

btnDeleteCategory.addEventListener('click', async () =>{
    await Category.deleteCategory(selectCategory.id);
    renderCategories();
})