const idp = document.getElementById('idp'),
    nameP = document.getElementById('name'),
    description = document.getElementById('des'),
    price = document.getElementById('price'),
    exi = document.getElementById('exi'),
    category = document.getElementById('category'),
    img = document.getElementById('img');


const getProduct = () =>{
    const id = idp.value,
        URL = `http://localhost/Y-LStore/mysql/consultProduct.php?i=${id}`;

    fetch(URL)
        .then(response => response.json())
        .then(getCategory())
        .then(response => {
            nameP.value = response.nombre;
            description.value = response.descripcion;
            price.value = response.precio;
            exi.value = response.existencia;
            img.value = response.imagen;
        })
        .catch(e => console.log(e));
}

const getCategory = () =>{
    const URL = `http://localhost/Y-LStore/mysql/consultCategory.php`;
    fetch(URL)
        .then(response => response.json())
        .then(response => {
            category.length = response.length + 1;
            var i=1;
            response.forEach(element => {
                category.options[i].text=element.toString();
                category.options[i].value=i++;
            });
        })
        .catch(e => console.log(e));
}

getProduct();