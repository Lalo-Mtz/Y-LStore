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


let permiso = true;
let precioOA = 0;
let nameArt = "";

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
            precioOA = response.precio;
            nameArt = response.nombre;
            if(response.existencia == 0){
                permiso = false;
            }

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
    if(permiso){
        const cant = cantidad.selectedIndex;
        if(cant == 0){
            alert("Debes colocar la cantidad que quieres agregar al carrito.")
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
    }else{
        alert("El producto no esta en existencia");
    }
});

btnComprar.addEventListener('click', e=>{
    if(permiso){
        const cant = cantidad.selectedIndex;
        if(cant == 0){
            alert("Debes colocar la cantidad que quieres comprar.")
        }else{
            PriceTot = precioOA * cant;

            const URL = `http://localhost/Y-LStore/mysql/newCompra.php?iu=${idu}&m=${PriceTot}&c=1`;

            fetch(URL)
            .then(response => response.json())
            .then(response => {
                if(response.idc != 0){
                    urlv2 = `http://localhost/Y-LStore/mysql/saveArtCom.php?ic=${response.idc}&ip=${idp}&c=${cant}`;
                    guardaOne(urlv2);
                }
            })
            .then(EnviaEmailOne(precioOA))
            .then(window.location.reload())
            .catch(e => console.log(e)) 
        }
    }else{
        alert("El producto no esta en existencia");
    }
});


const guardaOne = (link) =>{
    fetch(link)
        .then(response => response.json())
        .catch(e => console.log(e))
}

const EnviaEmailOne = (tot) =>{
    Total =tot;
    msg = "";

    msg += nameArt + "   $";
    msg += (Total) + ".  <br>";
    msg += "Total de la compra: " + Total;

    const URL = `http://localhost/Y-LStore/mysql/sendEmail.php?iu=${idu}&m=${msg}`;

    fetch(URL)
        .then(response => response.json())
        .catch(e => console.log(e))
}