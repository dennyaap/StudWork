let btnAccept = document.getElementById('btnAccept');

btnAccept.addEventListener('click', async () =>{
    await Category.editCategory({'id' : selectCategory.id, 'name' : categoryNameElement.value});
    renderCategories();
})

let btnDeleteCategory = document.getElementById('btnDeleteCategory')

btnDeleteCategory.addEventListener('click', async () =>{
    await Category.deleteCategory(selectCategory.id);
    renderCategories();
})