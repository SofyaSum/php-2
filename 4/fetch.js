let url = 'catalog.php';
let data = { 'button' : "click" };

async function postData(url = '', data) {
    const response = await fetch(url, {
        method: 'POST',
        headers: {
            //'Content-Type': 'application/json'
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: JSON.stringify(data)
    });
    return await response.text();
}

document.querySelector('.more').addEventListener("click", () => postData(url, data)
    .then((data) => {
        document.querySelector('.catalog').innerHTML = data;
    }));