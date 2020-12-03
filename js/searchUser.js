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


const getUser = () =>{
    const user = uneme.value,
        id = idu.value,
        URL = `http://localhost/Y-LStore/mysql/consultUser.php?u=${user}&i=${id}`;

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
            
        })
        .catch(e => console.log(e));
}

getUser();