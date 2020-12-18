const idu = document.getElementById("idu").value;

const box = document.getElementById("car-box"),
    page = document.getElementById("art-box");

let array;
let arrayPrice = new Array();

const addArticle = (id, i, n, c, t, p, e) =>{
    const articleBox = `
        <div class="article">
            <div class="img-nom">
                <div class="little-img">
                    <img src="${i}">
                </div>
                <div class="nom-acc">
                    <h5>${n}</h5>
                    <div class="ope-car">
                        <a href="mysql/deletePOC.php?iu=${idu}&ip=${id}">Eliminar</a> <a>Comprar ahora</a>
                    </div>
                </div>
            </div>

            <div class="box-can">
                <div class="cant-art">
                    <p onclick="sub(${id},${p})">➖</p>
                    <span id="item-${p}">${c}</span>
                    <p onclick="add(${id},${p})">➕</p>
                </div>
                <p>${e} disponibles</p>
            </div>

            <p id="item-price-${p}">$ ${t}</p>
        </div>
    `;

    box.insertAdjacentHTML('beforeend', articleBox);
}

const add = (i, p) =>{
    const item = document.getElementById("item-"+p);
    const itemPrice = document.getElementById("item-price-"+p);
    quan = array[p].cantidad;
    exis = array[p].existencia;

    if(quan == exis){
        alert("Ya no puedes incluir más articulos.");
    }else{
        quan++;
        const URL = `http://localhost/Y-LStore/mysql/incrementArt.php?iu=${idu}&ip=${i}&can=${quan}`;

        fetch(URL)
            .then(response => response.json())
            .then(response => {
                if(response){
                    item.innerHTML = '';
                    itemPrice.innerHTML = '';
                    item.insertAdjacentHTML('beforeend', quan);
                    array[p].cantidad = quan;
                    arrayPrice[p] = quan * array[p].precio;
                    itemPrice.insertAdjacentHTML('beforeend', "$ " + arrayPrice[p]);
                    recalcular();
                }
            })
            .catch(e => console.log(e))
        
    }
}

const sub = (i, p) =>{
    const item = document.getElementById("item-"+p);
    const itemPrice = document.getElementById("item-price-"+p);
    quan = array[p].cantidad;
    exis = array[p].existencia;

    if(quan == 1){
        alert("Ya no puedes quitar más articulos.");
    }else{
        quan--;
        const URL = `http://localhost/Y-LStore/mysql/incrementArt.php?iu=${idu}&ip=${i}&can=${quan}`;

        fetch(URL)
            .then(response => response.json())
            .then(response => {
                if(response){
                    item.innerHTML='';
                    itemPrice.innerHTML = '';
                    item.insertAdjacentHTML('beforeend', quan);
                    array[p].cantidad = quan;
                    arrayPrice[p] = quan * array[p].precio;
                    itemPrice.insertAdjacentHTML('beforeend', "$ " + arrayPrice[p]);
                    recalcular();
                }
            })
            .catch(e => console.log(e))  
    }
}

const recalcular = () =>{
    const priceTot = document.getElementById("price-car-tot");
    priceTot.innerHTML = '';
    Total=0;

    arrayPrice.forEach(e => {
        Total += e;
    });

    priceTot.insertAdjacentHTML('beforeend', "$ "+ Total);
}

const addBtnCompra = (c) =>{
    const BtnComprar = `
        <div class="article price-car">
            <h4>Total de la compra:</h4>
            <span id="price-car-tot">$ ${c}</span>
        </div>
        <div class="article">
            <button class="btn cmp ult" onclick="ComprarArt()">Comprar</button>
        </div>
    `;
    box.insertAdjacentHTML('beforeend', BtnComprar);
}



const getCar = () =>{
    const URL = `http://localhost/Y-LStore/mysql/getCar.php?iu=${idu}`;
    
    fetch(URL)
        .then(response => response.json())
        .then(response => {
            if(response != null){
                array = response;
                i=1;
                cont = 0;
                response.forEach(e => {
                    if(i == 3){page.classList.remove("v-h"); page.classList.add("m-c");}
                    imagen = 'img/' + e.imagen;
                    tot = parseFloat(e.precio) * parseInt(e.cantidad);
                    cont += tot;
                    arrayPrice[i-1] = tot;
                    addArticle(e.idp, imagen, e.nombre, e.cantidad, tot, (i++)-1, e.existencia);
                });
                addBtnCompra(cont);
            }else{
                isClear();
            }
        })
}

const ComprarArt = () =>{
    PriceCompra = 0;
    arrayPrice.forEach(e =>{
        PriceCompra += e;
    });


    const URL = `http://localhost/Y-LStore/mysql/newCompra.php?iu=${idu}&m=${PriceCompra}&c=${array.length}`;

    fetch(URL)
        .then(response => response.json())
        .then(response => {
            if(response.idc != 0){
                array.forEach(e =>{
                    urlv2 = `http://localhost/Y-LStore/mysql/saveArtCom.php?ic=${response.idc}&ip=${e.idp}&c=${e.cantidad}`;
                    guarda(urlv2);
                });
            }
        })
        .then(EnviaEmail())
        .then(limpiaCarrito())
        .catch(e => console.log(e))
}

const guarda = (link) =>{
    fetch(link)
        .then(response => response.json())
        .catch(e => console.log(e))
}

const limpiaCarrito = () =>{
    const URL = `http://localhost/Y-LStore/mysql/cleanCart.php?iu=${idu}`;

    fetch(URL)
        .then(response => response.json())
        .then(response => {
            if(response){
                window.location.reload();
            }
        })
}

const isClear = () =>{
    const clr = `
        <div class="article price-car">
            <h4 class="centar-texto">Tu carrito está vacio!!</h4>
        </div>
    `;
    box.insertAdjacentHTML('beforeend', clr);   
}


const EnviaEmail = () =>{
    Total = 0;
    msg = "";
    arrayPrice.forEach(e => {
        Total += e;
    });

    array.forEach(e =>{
        msg += e.nombre + "  ";
        msg += (e.cantidad * e.precio) + "  <br>";
    });
    msg += "Total de la compra: " + Total;

    const URL = `http://localhost/Y-LStore/mysql/sendEmail.php?iu=${idu}&m=${msg}`;

    fetch(URL)
        .then(response => response.json())
        .catch(e => console.log(e))
}

getCar();