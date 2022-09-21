function hideProduct(id) {
    const request = new XMLHttpRequest();
    const url = "query.php?method=hideProduct&id=" + id;
    request.open('GET', url);
    request.send();
    const element = document.getElementById(id);
    element.remove();
}

function changeQuantity(id, dif) {
    const request = new XMLHttpRequest();
    const url = "query.php?method=changeQuantity&id=" + id + "&dif=" + dif;
    request.open('GET', url);
    request.addEventListener("readystatechange", () => {
        if (request.status === 200) {
            const quantity = document.getElementById('quantity'+id);
            quantity.innerHTML = request.responseText;
        }
    });
    request.send();
}