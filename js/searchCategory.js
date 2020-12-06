//const categoria = document.formProduct.category;
const categoria = document.getElementById('category');

const getCategory = () =>{
    const URL = `http://localhost/Y-LStore/mysql/consultCategory.php`
    fetch(URL)
        .then(response => response.json())
        .then(response => {
            categoria.length = response.length;
            var i=1;
            response.forEach(element => {
                categoria.options[i].text=element.toString();
                categoria.options[i++].value=element.toString();
            });
        })
        .catch(e => console.log(e));
}

getCategory();
