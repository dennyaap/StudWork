async function getData(route)
{
    let response = await fetch(route);

    let res = await response.json();

    return res;
}

async function postData(route, data){
    let response = await fetch(route, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify({data})
    });

    return await response.json();
}
async function postDataCategory(route, data){
    let response = await fetch(route, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify({data})
    });
    console.log(response);
}