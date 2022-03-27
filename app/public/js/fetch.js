async function getData(route)
{
    let response = await fetch(route);

    let res = await response.json();

    return res;
}