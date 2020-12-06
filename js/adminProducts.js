const btnBP = document.getElementById("btnBP"), 
    btnNP = document.getElementById("btnNP"),
    btnAP = document.getElementById("btnAP"),
    btnEL = document.getElementById("btnEL"),
    btnNC = document.getElementById("btnNC"),
    btnSearch = document.getElementById("seachProduct");

const content = document.getElementById("contentProd"),
    table = document.getElementById("tablePro"),
    pagina = document.getElementById("secPro");

let b = 0;
let p = 0;

const addRow = (id, nom, des, pre, exi, cat, cal, img) =>{
    const row = `
        <table border=1>
            <tr>
                <td>${id}</td>
                <td>${nom}</td>
                <td>${des}</td>
                <td>${pre}</td>
                <td>${exi}</td>
                <td>${cat}</td>
                <td>${cal}</td>
                <td>${img}</td>
            </tr>
        </table>
    `;
    
    table.insertAdjacentHTML('beforeEnd', row);
}

const addSearch = () =>{
    const cuadro = `
        <fieldset>
        <legend>Buscar un producto</legend>
            <div class="infoPro">
                <div>
                    <label for="nameP">Nombre:</label>
                    <input type="text" name="nameP" id="nameP" placeholder="Nombre" autocomplete="off">
                </div>

                <div>
                    <label for="category">Categoría:</label>
                    <select name="category" id="category">
                        <option value="nothing" disabled selected>--Seleccione--</option>
                    </select>
                </div>

                <div>
                    <label>Rango de precio:</label>
                    <input type="number" name="" id="min" placeholder="Minimo">
                    <input type="number" name="" id="max" placeholder="Maximo">
                </div>
            </div>
        </fieldset>
    `;

    if(b==0) content.insertAdjacentHTML('afterbegin',cuadro);
    b=1;
}

const getCategory = () =>{
    const URL = `http://localhost/Y-LStore/mysql/consultCategory.php`;
    fetch(URL)
        .then(response => response.json())
        .then(addSearch())
        .then(response => {
            const categoria = document.getElementById('category');
            categoria.length = response.length;
            var i=1;
            response.forEach(element => {
                categoria.options[i].text=element.toString();
                categoria.options[i++].value=element.toString();
            });
        })
        .catch(e => console.log(e));
}

btnBP.addEventListener('click', e =>{
    console.log(p);

    if(p==0){
        getCategory();
        btnSearch.classList.remove("no-visible");
        p=1;
    }else{
        console.log("Si entro");
        window.location.reload();
        p=0;

    }

});

btnNP.addEventListener('click', e =>{
    
});

btnAP.addEventListener('click', e =>{

});

btnEP.addEventListener('click', e =>{

});

btnNC.addEventListener('click', e =>{

});

btnSearch.addEventListener('click', e =>{
    const nameI = document.getElementById("nameP"),
        catI = document.getElementById("category"),
        minI = document.getElementById("min"),
        maxI = document.getElementById("max");

    min = (minI.value == "") ? 0 : minI.value;
    max = (maxI.value == "") ? 0 : maxI.value;
    op = 0;
    
    if(nameI.value == ""){
        op=4;
        if(catI.value == ""){
            op=5;
            if(min == 0 && max ==0){
                op=0;
            }
        }
    }else{
        if(catI.value == ""){
            op=3;
            if(min == 0 && max ==0){
                op=0;
            }
        }
    }

    if(nameI.value == "" && catI.value == "nothing" && min == 0 && max == 0){
        op=0;
    }else{
        if(catI.value == "nothing" && min == 0 && max == 0){
            op=1;
        }else{
            if(min == 0 || max == 0){
                op=2;
                if(nameI.value == "" && catI.value != "nothing"){
                    op=4;
                }
                if((min == 0 || max == 0) && nameI.value == "" && catI.value == "nothing"){
                    op=0;
                }
            }else{
                op=3;
                if(nameI.value == "" && catI.value == "nothing" && min != 0 && max != 0){
                    op=5;
                }

                if(nameI.value == "" && catI.value != "nothing" && min != 0 && max != 0){
                    op=6;
                }
            }
        }
    }

    table.classList.remove("no-visible");
    pagina.classList.remove("v-h");
    pagina.classList.add("m-c");


    if(op != 0){
        const consulta = `http://localhost/Y-LStore/mysql/consultProducts.php?n=${nameI.value}&c=${catI.value}&mi=${min}&ma=${max}&o=${op}`;

        fetch(consulta)
            .then(response => response.json())
            .then(response => {
                response.forEach(e => {
                    addRow(e.idp, e.nombre, e.descripcion, e.precio,
                        e.existencia, e.categoria, e.calificacion, e.imagen);
                });
            })
            .catch(e => console.log(e));
    }
});