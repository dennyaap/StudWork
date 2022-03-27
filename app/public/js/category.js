let categoriesContainer = document.getElementById('categoriesContainer')

let colorElements = document.getElementsByClassName('')
let colors = ['#828EFF', '#FF9797', '#4CD47D', '#C5E5FE', '#ff8282', '#FBD547'];

async function getCategoriesJSON()
{
    let route = '/app/controllers/categories/findCategories.php';
    let categories = await getData(route);
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

// function createCard({id, })