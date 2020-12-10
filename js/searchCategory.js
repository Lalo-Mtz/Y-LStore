const category = document.getElementById('category');

const getCategory = () =>{
    const URL = `http://localhost/Y-LStore/mysql/consultCategory.php`
    fetch(URL)
        .then(response => response.json())
        .then(response => {
            category.length = response.length+1;
            var i=1;
            response.forEach(element => {
                category.options[i].text=element.toString();
                category.options[i].value=i++;
            });
        })
        .catch(e => console.log(e));
}

getCategory();
