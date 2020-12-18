const nameP = document.getElementById("name"),
    precio = document.getElementById("precio"),
    des = document.getElementById("des"),
    exi = document.getElementById("exi"),
    cantidad = document.getElementById("can-p"),
    imgPro = document.getElementById("img-product"),
    idp = document.getElementById("idp").value,
    idu = document.getElementById("idu").value,
    userName = document.getElementById("userName").value;

const btnComprar = document.getElementById("comprar"),
    btnAgragar = document.getElementById("agregar"),
    btnEnviar = document.getElementById("btnEnviarCom");

const txtarea = document.getElementById("txtarea"),
    comments = document.getElementById("comments");

const insert = (n, p, d, e) =>{
    nameP.insertAdjacentHTML('beforeend', n);
    precio.insertAdjacentHTML('beforeend', p);
    des.insertAdjacentHTML('beforeend', d);
    exi.insertAdjacentHTML('beforeend', e);
}

const getInfo = () =>{
    const URL = `http://localhost/Y-LStore/mysql/consultProduct.php?i=${idp}`;

    fetch(URL)
        .then(response => response.json())
        .then(getComments())
        .then(response => {
            insert(
                response.nombre,
                response.precio,
                response.descripcion,
                response.existencia
            );
            imgPro.src = "img/" + response.imagen;
            cantidad.length = parseInt(response.existencia) + 1;
            for (let i = 1; i <= cantidad.length; i++) {
                cantidad.options[i].text = i;
                cantidad.options[i].value = i;
            }
        })
        .catch(e => console.log(e))
}

const getComments = () =>{
    const URL = `http://localhost/Y-LStore/mysql/getComments.php?ip=${idp}`;

    fetch(URL)
        .then(response => response.json())
        .then(response => {
            response.forEach(e => {
                addComentario(e.nombre + " " + e.ape_pat, e.comentario);
            });
        })
}

getInfo();


const addComentario = (nombre, msg) =>{
    const comentario = `
        <div class="msg">
            <h5>-${nombre}</h5>
            <div class="text-com">
                <p>${msg}</p>
            </div>
        </div>
    `;

    comments.insertAdjacentHTML('beforeend', comentario);
}

const saveCommentary = () =>{
    const msg = txtarea.value;
    const URL = `http://localhost/Y-LStore/mysql/saveCommentary.php?ip=${idp}&iu=${idu}&msg=${msg}`;

    fetch(URL)
        .then(response => response.json())
        .then(response => {
            if(response){
                addComentario(userName, msg);
            }else{
                console.log("Ocurrio un error al guardar el comentario.");
            }
            txtarea.value = "";
        })
        .catch(e => console.log(e))
}

btnEnviar.addEventListener('click', e =>{
    if(txtarea.value != ""){
        saveCommentary();
    }
});

btnAgragar.addEventListener('click', e=>{
    const cant = cantidad.selectedIndex;
    if(cant == 0){
        alert("Debes colocar la cantidad que quieres comprar.")
    }else{
        const URL = `http://localhost/Y-LStore/mysql/saveCar.php?ip=${idp}&iu=${idu}&cant=${cant}`;
        fetch(URL)
            .then(response => response.json())
            .then(response => {
                if(response){
                    alert("Se agregaron " + cant + " " + "articulos a tu carrito.");
                }
            })
            .catch(e => console.log(e))
    }
});