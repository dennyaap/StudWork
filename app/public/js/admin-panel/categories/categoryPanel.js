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

function renderDangerAlert(container, errors){
    let errorsText = '';
        
    errors.forEach(error =>{
        errorsText += Alert.createDangerAlert(error);
    });
    container.innerHTML = errorsText;
}
let paletteColorElement = document.getElementById('paletteColor');
//добавление новой категории
async function addCategory(){
    let errors = await Validation.checkValidation(textElement);
    if(errors.length !== 0){
        renderDangerAlert(dangerAlertContainer, errors);
    } 
    else 
    {
        text = textElement.value;
        clearElement(textElement);
        successAlertElement.style.display = '';
        let categories = [];
        categories.push(text);
        clearElement(dangerAlertContainer);
        setTimeout(()=> successAlertElement.style.display = 'none', 1000);
        textElement.value = '';
        
        await renderCategories({'name' : text, 'color' : paletteColorElement.value});
    }
}
function clearElement(element){
    element.textContent = '';
}


renderCategories();

async function renderCategories(data = null)
{
    let routeGetData = '/app/controllers/admin-panel/categories/getCategories.php';
    let routePostData = '/app/controllers/admin-panel/categories/createCategory.php';
    let categories = [];

    if(data){
        await postData(routePostData, data);
    } 
    categories = await getData(routeGetData);
    outOnPage(categories);
}

function outOnPage(data)
{
    let text = '';
    let numberCategory = 0;

    data.forEach(category => {
        numberCategory++;
        text += Card.createCard(category, numberCategory);
    });
    categoriesContainer.innerHTML = text;
}

const App = {
    data() {
        return {
            counter: 0
        }
    }
}
const app = Vue.createApp(App);
app.mount('#app');
