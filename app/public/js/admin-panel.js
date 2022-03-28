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

async function addCategory(){
    text = textElement.value;
    textElement.textContent = '';
    let categories = [];
    categories.push(text);
    
    await getCategories(text);
}

getCategories();

async function getCategories(data = null)
    {
        let route = '/app/controllers/categories/findCategories.php';
        let categories = [];

        if(data){
            categories = await getDataJSON(route, data);

        } else {
            categories = await getData(route);
        }
        outOnPage(categories);
    }

function outOnPage(data)
{
    text = '';
    data.forEach(category => {
        text += createCard(category);
    });
    categoriesContainer.innerHTML = text;
}

function createCard({id, name}){
    return `<tr>
    <td>${id}</td>
    <td>${name}</td>
    <td><i class="fas fa-solid fa-pen"></i></td>
    <td><i class="fas fa-solid fa-trash"></i></td>
  </tr>`
}

//получение категорий
// let categoriesContainer = document.getElementById('categoriesContainer');
// getCategories();

// async function getCategories()
// {
//     let route = '/app/controllers/categories/findCategories.php';
//     let categories = await getData(route);
//     outOnPage(categories);
// }