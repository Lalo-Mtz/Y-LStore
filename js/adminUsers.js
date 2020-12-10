const btnBU = document.getElementById("btnBU"), 
    btnNU = document.getElementById("btnNU"),
    btnAU = document.getElementById("btnAU"),
    btnEU = document.getElementById("btnEU"),
    btnSearch = document.getElementById("seachUser");

const content = document.getElementById("contentUsu"),
    table = document.getElementById("tableUsu"),
    pagina = document.getElementById("secUsu");


let p = 0, s = 0, t = 0, c = 0;
let b=0;

const addSearch = () =>{
    const cuadro = `
        <fieldset>
        <legend>Buscar un usuario</legend>
            <div class="infoPro ma-bo">
                <div>
                    <label for="idUsu">ID:</label>
                    <input type="number" name="idUsu" id="idUsu" placeholder="ID" autocomplete="off">
                </div>

                <div>
                    <label for="nameU">Nombre:</label>
                    <input type="text" name="nameU" id="nameU" placeholder="Nombre completo" autocomplete="off">
                </div>

                <div>
                    <label for="correoU">Correo:</label>
                    <input type="email" name="correoU" id="correoU" placeholder="E-mail" autocomplete="off">
                </div>
            </div>
        </fieldset>
    `;

    if(b==0) content.insertAdjacentHTML('afterbegin',cuadro);
    b=1;
}

const btnPressed = () =>{
    b=0;
    if(p==1){
        btnBU.classList.remove("precionado");
        p=0;
    }
    if(s==1){
        btnAU.classList.remove("precionado");
        s=0;
    }
    if(t==1){
        btnEU.classList.remove("precionado");
        t=0;
    }
    /*if(c==1){
        btnNC.classList.remove("precionado");
        c=0;
    }*/
}

const pressBtn = () =>{
    btnPressed();
    content.innerHTML='';
    addSearch();
    btnSearch.classList.remove("no-visible");
    table.innerHTML='';
    table.classList.add("no-visible");
}


btnBU.addEventListener('click', e =>{
    if(p==0){
        pressBtn();
        btnBU.classList.add("precionado");
        p=1;
    }else{
        window.location.reload();
    }
});

btnNU.addEventListener('click', e=>{
    window.location.href = 'http://localhost/Y-LStore/home.php?op=9';
});

btnAU.addEventListener('click', e =>{
    if(s==0){
        pressBtn();
        btnAU.classList.add("precionado");
        s=1;
    }else{
        window.location.reload();
    }
});

btnEU.addEventListener('click', e =>{
    if(t==0){
        pressBtn();
        btnEU.classList.add("precionado");
        t=1;
    }else{
        window.location.reload();
    }
});


btnSearch.addEventListener('click', e=>{
    const idUsu = document.getElementById("idUsu"),
        nameI = document.getElementById("nameU"),
        correoI = document.getElementById("correoU");

    idu = (idUsu.value == "") ? 0 : idUsu.value;
    op=0;

    if(idu == 0){
        if(nameI.value == "" && correoI.value == ""){
            op=0;
        }else{
            if(correoI.value == ""){
                op=2;
            }else{
                if(nameI.value != "" && correoI.value != ""){
                    op=4;
                }else{
                    op=3;
                }
            }
        }
    }else{
        op = 1;
    }

    table.innerHTML = '';
    addHead();
    table.classList.remove("no-visible");
    pagina.classList.remove("v-h");
    pagina.classList.add("m-c");


    if(op != 0){
        const consulta = `http://localhost/Y-LStore/mysql/consultUsers.php?n=${nameI.value}&c=${correoI.value}&i=${idu}&o=${op}`;

        fetch(consulta)
            .then(response => response.json())
            .then(response => {
                response.forEach(e => {
                    username = e.nombre + ' ' + e.ape_pat + ' ' + e.ape_mat;
                    addRow(e.idu, username , e.fecha, e.email, e.telefono, e.tipo);
                });
            })
            .catch(e => console.log(e));
    }

});


const addHead = () =>{
    if(p==1) head = `
        <tr class="row-one">
            <td>Id</td>
            <td>Nombre</td>
            <td>Fecha de nacimiento</td>
            <td>E-mail</td>
            <td>Teléfono</td>
            <td>Tipo</td>
        </tr>
    `;

    if(s==1 || t==1) head = `
        <tr class="row-one">
            <td>Id</td>
            <td>Nombre</td>
            <td>Fecha de nacimiento</td>
            <td>E-mail</td>
            <td>Teléfono</td>
            <td>Tipo</td>
            <td>Operación</td>
        </tr>
    `;

    table.insertAdjacentHTML('beforeend', head);
}

const addRow = (id, nom, fecha, emailu, tel, type) =>{
    
    if(p==1) row = `
        <table border=1>
            <tr>
                <td class="centrar-texto">${id}</td>
                <td>${nom}</td>
                <td class="centrar-texto">${fecha}</td>
                <td class="centrar-texto">${emailu}</td>
                <td class="centrar-texto">${tel}</td>
                <td class="centrar-texto">${type}</td>
            </tr>
        </table>
    `;

    if(s==1) row = `
        <table border=1>
            <tr>
                <td class="centrar-texto">${id}</td>
                <td>${nom}</td>
                <td class="centrar-texto">${fecha}</td>
                <td class="centrar-texto">${emailu}</td>
                <td class="centrar-texto">${tel}</td>
                <td class="centrar-texto">${type}</td>
                <td class="centrar-texto"><a href="home.php?op=8&i=${id}"><button class="btn-e">Actualizar</button></a></td>
            </tr>
        </table>
    `;

    if(t==1) row = `
        <table border=1>
            <tr>
                <td class="centrar-texto">${id}</td>
                <td>${nom}</td>
                <td class="centrar-texto">${fecha}</td>
                <td class="centrar-texto">${emailu}</td>
                <td class="centrar-texto">${tel}</td>
                <td class="centrar-texto">${type}</td>
                <td class="centrar-texto"><a href="mysql/deleteUser.php?i=${id}"><button class="btn-e">Eliminar</button></a></td>
            </tr>
        </table>
    `;
    
    table.insertAdjacentHTML('beforeend', row);
}