const idu = document.getElementById('idu'),
    uneme = document.getElementById('uname'),
    apepat = document.getElementById('apepat'),
    apemat = document.getElementById('apemat'),
    birthdate = document.getElementById('birthdate'),
    mail = document.getElementById('mail'),
    phone = document.getElementById('phone');

const calle = document.getElementById('calle'),
    ext = document.getElementById('ext'),
    inte = document.getElementById('inte'),
    cp = document.getElementById('cp'),
    co = document.getElementById('co'),
    ci = document.getElementById('ci'),
    es = document.getElementById('es');

const like = document.getElementById('like'),
    activa = document.getElementById('activa');

arrayGustos = new Array();
arrayG = new Array();

const addButton = e =>{
    cat = e.toString();
    const newBtn = `
        <div class="like-cat centrar-texto">
            <p>${cat}</p><input type="checkbox" name="${cat}" id="${cat}">
        </div>
    `;

    like.insertAdjacentHTML('beforeend',newBtn);
}


const getUser = () =>{
    const user = uneme.value,
        id = idu.value,
        URL = `http://localhost/Y-LStore/mysql/consultUser.php?i=${id}`;

    fetch(URL)
        .then(response => response.json())
        .then(response => {
            apepat.value = response.ape_pat;
            apemat.value = response.ape_mat;
            birthdate.value = response.fecha;
            phone.value = response.telefono;

            calle.value = response.calle;
            ext.value = response.n_ext;
            inte.value = response.n_int;
            cp.value = response.cp;
            co.value = response.colonia;
            ci.value = response.ciudad;
            es.value = response.estado;
            arrayG = response.gustos.split(",");
            checkAdd(arrayG);
        })
        .then(getCategory())
        .catch(e => console.log(e));
}

const getCategory = () =>{
    const URL = `http://localhost/Y-LStore/mysql/consultCategory.php`
    fetch(URL)
        .then(response => response.json())
        .then(response => {
            arrayGustos = response;
            response.forEach(e => {
                addButton(e);
            });
        })
        .catch(e => console.log(e));
}

const checkAdd = (array) =>{
    array.forEach(e =>{
        chbox = document.getElementById(e);
        chbox.checked = activa.checked;
    });
}

getUser();



const incrementaG = () =>{
    gustos = new Array();

    arrayGustos.forEach(e =>{
        chbox = document.getElementById(e);
        if(chbox.checked){
            gustos.push(e);
        }
    });

    if(gustos.length <= 1){
        alert('Selecciona por lo menos 2 categorías, en el apartado de "Gustos"');
    }else{
        JSON.stringify(gustos);

        const gst = `
            <input type="hidden" name="gustos" id="gustos" value="${gustos}" required>
        `;

        like.insertAdjacentHTML('beforeend',gst);

        alert("Se modificarán tus datos");

        document.fromInfo.submit();
    }
}

