let categoriesContainer = document.getElementById('categoriesContainer')

let colors = ['#828EFF', '#FF9797', '#4CD47D', '#C5E5FE', '#ff8282', '#FBD547'];

getCategories();

async function getCategories()
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

function createCard({id, name}){
    return `<div class="col">
    <div class="card category-card" id="${id}">
        <div class="category-color"></div>
        <div class="card-body">
            <h5 class="card-title">${name}</h5>
            <p class="card-text">smth</p>
        </div>
    </div>
</div>`
}

// function createCard({id, })