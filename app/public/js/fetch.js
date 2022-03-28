async function getData(route)
{
    let response = await fetch(route);

    let res = await response.json();

    return res;
}

async function getDataJSON(route, data){
    let response = await fetch(route, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify({data})
    });
    console.log(response);

    return await response.json();
}