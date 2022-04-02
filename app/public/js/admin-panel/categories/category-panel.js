//закрытие и открытие левого меню
let el = document.getElementById("wrapper");
let toggleButton = document.getElementById("menu-toggle");

toggleButton.addEventListener('click', () => {
    el.classList.toggle("toggled");
});


//вставка записи в таблицу с категориями
let textElement = document.getElementById('categoryInput');
let btnAdd = document.getElementById('btnAdd');
let container = document.getElementById('tableContainer');


btnAdd.addEventListener('click', async () =>{
    await addCategory();
});

let dangerAlertContainer = document.getElementById('dangerAlertContainer');
let successAlertElement = document.getElementById('successAlert');
successAlertElement.style.display = 'none';
//проверка на существовании такого названия

async function addCategory(){
    let errors = await Validation.checkValidation(textElement);

    if(errors.length !== 0){
        let errorsText = '';
        
        errors.forEach(error =>{
            errorsText += Alert.createDangerAlert(error);
        });
        dangerAlertContainer.innerHTML = errorsText;
    } 
    else 
    {
        text = textElement.value;
        clear(textElement);
        successAlertElement.style.display = '';
        let categories = [];
        categories.push(text);
        clear(dangerAlertContainer);
        setTimeout(()=> successAlertElement.style.display = 'none', 1000);
        textElement.value = '';
        
        await getCategories(text);
    }
}
function clear(element){
    element.textContent = '';
}


getCategories();

async function getCategories(data = null)
{
    let route = '/app/controllers/categories/findCategories.php';
    let categories = [];

    if(data){
        categories = await postData(route, data);

    } else {
        categories = await getData(route);
    }
    outOnPage(categories);
}

function outOnPage(data)
{
    let text = '';
    let numberCategory = 0;

    data.forEach(category => {
        numberCategory++;
        text += createCard(category, numberCategory);
    });
    categoriesContainer.innerHTML = text;
}

function createCard({id, name}, numberCategory){
    return `<tr class="category-id" data-id="${id}">
    <td class="td-center">${numberCategory}</td>
    <td>${name}</td>
    <td onclick="showEditCategory(this)" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@getbootstrap"><i class="fas fa-solid fa-pen"></i></onclick=></td>
    <td onclick="showDeleteCategory(this)" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-solid fa-trash"></i></td>
  </tr>`
}

let categoryNameElement = document.getElementById('category-name');
let categoryNameDeleteElement = document.getElementById('category-name-delete');

let selectCategory = {}


async function showEditCategory(e){
    let currentCategoryId = e.closest('.category-id').dataset.id;
    selectCategory = await Category.findCategory(currentCategoryId)
    let categoryName = selectCategory.name;
    categoryNameElement.value = categoryName;
}

async function showDeleteCategory(e){
    let currentCategoryId = e.closest('.category-id').dataset.id;
    selectCategory = await Category.findCategory(currentCategoryId)
    let categoryName = selectCategory.name;
    categoryNameDeleteElement.textContent = categoryName;
}

let btnAccept = document.getElementById('btnAccept');
btnAccept.addEventListener('click', async () =>{
    let newCategoryName = categoryNameElement.value;
    await Category.editCategory({'id' : selectCategory.id, 'name' : newCategoryName});
    getCategories();
})
let btnDeleteCategory = document.getElementById('btnDeleteCategory')
btnDeleteCategory.addEventListener('click', async () =>{
    let newCategoryName = categoryNameElement.value;
    await Category.deleteCategory(selectCategory.id);
    getCategories();
})