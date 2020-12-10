const btnBP = document.getElementById("btnBP"), 
    btnNP = document.getElementById("btnNP"),
    btnAP = document.getElementById("btnAP"),
    btnEP = document.getElementById("btnEP"),
    btnNC = document.getElementById("btnNC"),
    btnSearch = document.getElementById("seachProduct");

const content = document.getElementById("contentProd"),
    table = document.getElementById("tablePro"),
    pagina = document.getElementById("secPro");

let b = 0;
let p = 0, s = 0, t = 0, c = 0;

const addHead = () =>{
    if(p==1) head = `
        <tr class="row-one">
            <td>Id</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Excistencia</td>
            <td>Categoría</td>
            <td>Calificación</td>
        </tr>
    `;

    if(s==1 || t==1) head = `
        <tr class="row-one">
            <td>Id</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Precio</td>
            <td>Excistencia</td>
            <td>Categoría</td>
            <td>Calificación</td>
            <td>Operación</td>
        </tr>
    `;

    table.insertAdjacentHTML('beforeend', head);
}

const addRow = (id, nom, des, pre, exi, cat, cal) =>{
    
    if(p==1) row = `
        <table border=1>
            <tr>
                <td class="centrar-texto">${id}</td>
                <td>${nom}</td>
                <td>${des}</td>
                <td class="centrar-texto">${pre}</td>
                <td class="centrar-texto">${exi}</td>
                <td class="centrar-texto">${cat}</td>
                <td class="centrar-texto">${cal}</td>
            </tr>
        </table>
    `;

    if(s==1) row = `
        <table border=1>
            <tr>
                <td class="centrar-texto">${id}</td>
                <td>${nom}</td>
                <td>${des}</td>
                <td class="centrar-texto">${pre}</td>
                <td class="centrar-texto">${exi}</td>
                <td class="centrar-texto">${cat}</td>
                <td class="centrar-texto">${cal}</td>
                <td class="centrar-texto"><a href="home.php?op=6&i=${id}"><button class="btn-e">Actualizar</button></a></td>
            </tr>
        </table>
    `;

    if(t==1) row = `
        <table border=1>
            <tr>
                <td class="centrar-texto">${id}</td>
                <td>${nom}</td>
                <td>${des}</td>
                <td class="centrar-texto">${pre}</td>
                <td class="centrar-texto">${exi}</td>
                <td class="centrar-texto">${cat}</td>
                <td class="centrar-texto">${cal}</td>
                <td class="centrar-texto"><a href="mysql/deleteProduct.php?i=${id}"><button class="btn-e">Eliminar</button></a></td>
            </tr>
        </table>
    `;
    
    table.insertAdjacentHTML('beforeend', row);
}

const addSearch = () =>{
    const cuadro = `
        <fieldset>
        <legend>Buscar un producto</legend>
            <div class="infoPro">
                <div>
                    <label for="idPro">ID:</label>
                    <input type="number" name="idPro" id="idPro" placeholder="ID" autocomplete="off">
                </div>

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

const addNewCategory = () =>{
    const newCategory = `
        <fieldset>
        <legend>Nueva Categoría</legend>
            <form action="mysql/newCategory.php" class="newCatego" method="post">
                <div>
                    <label for="namecat">Nombre:</label>
                    <input type="text" name="namecat" id="namecat" placeholder="Nueva categoría" autocomplete="off">
                </div>

                <div>
                    <button type="submit" class="btn">Guardar</button>
                </div>
            </form>
        </fieldset>
    `;
    
    if(b==0) content.insertAdjacentHTML('afterbegin',newCategory);
    b=1;
}

const btnPressed = () =>{
    b=0;
    if(p==1){
        btnBP.classList.remove("precionado");
        p=0;
    }
    if(s==1){
        btnAP.classList.remove("precionado");
        s=0;
    }
    if(t==1){
        btnEP.classList.remove("precionado");
        t=0;
    }
    if(c==1){
        btnNC.classList.remove("precionado");
        c=0;
    }
}

const getCategory = () =>{
    const URL = `http://localhost/Y-LStore/mysql/consultCategory.php`;
    fetch(URL)
        .then(response => response.json())
        .then(addSearch())
        .then(response => {
            const categoria = document.getElementById('category');
            categoria.length = response.length + 1;
            var i=1;
            response.forEach(element => {
                categoria.options[i].text=element.toString();
                categoria.options[i++].value=element.toString();
            });
        })
        .catch(e => console.log(e));
}

const pressBtn = () =>{
    btnPressed();
    content.innerHTML='';
    getCategory();
    btnSearch.classList.remove("no-visible");
    table.innerHTML='';
    table.classList.add("no-visible");
}

btnBP.addEventListener('click', e =>{
    if(p==0){
        pressBtn();
        btnBP.classList.add("precionado");
        p=1;
    }else{
        window.location.reload();
    }
});

btnNP.addEventListener('click', e =>{
    window.location.href = 'http://localhost/Y-LStore/home.php?op=7';
});

btnAP.addEventListener('click', e =>{
    if(s==0){
        pressBtn();
        btnAP.classList.add("precionado");
        s=1;
    }else{
        window.location.reload();
    }
});

btnEP.addEventListener('click', e =>{
    if(t==0){
        pressBtn();
        btnEP.classList.add("precionado");
        t=1;
    }else{
        window.location.reload();
    }
});

btnNC.addEventListener('click', e =>{
    if(c==0){
        content.innerHTML='';
        table.innerHTML='';
        table.classList.add("no-visible");
        pagina.classList.remove("m-c");
        pagina.classList.add("v-h");
        btnPressed();
        btnNC.classList.add("precionado");
        addNewCategory();
        btnSearch.classList.add("no-visible");

        c=1;
    }else{
        window.location.reload();
    }
});

btnSearch.addEventListener('click', e =>{
    const idPro = document.getElementById("idPro"),
        nameI = document.getElementById("nameP"),
        catI = document.getElementById("category"),
        minI = document.getElementById("min"),
        maxI = document.getElementById("max");

    idpr = (idPro.value == "") ? 0 : idPro.value;
    min = (minI.value == "") ? 0 : minI.value;
    max = (maxI.value == "") ? 0 : maxI.value;
    op = 0;

    if(idpr == 0){        
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
    }else{
        op = 7;
    }

    table.innerHTML = '';
    addHead();
    table.classList.remove("no-visible");
    pagina.classList.remove("v-h");
    pagina.classList.add("m-c");


    if(op != 0){
        const consulta = `http://localhost/Y-LStore/mysql/consultProducts.php?n=${nameI.value}&c=${catI.value}&mi=${min}&ma=${max}&i=${idpr}&o=${op}`;

        fetch(consulta)
            .then(response => response.json())
            .then(response => {
                response.forEach(e => {
                    addRow(e.idp, e.nombre, e.descripcion, e.precio,
                        e.existencia, e.categoria, e.calificacion);
                });
            })
            .catch(e => console.log(e));
    }
});