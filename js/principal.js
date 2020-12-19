const conPrin = document.getElementById("con-princi");

const product = document.getElementById("busca");

const btnBuscarA = document.getElementById("btn-buscar-A");

btnBuscarA.addEventListener('click',  e=>{
    if(product.value != ""){
        const URL =  `http://localhost/Y-LStore/mysql/getProducts.php?n=${product.value}`;

        fetch(URL)
        .then(response => response.json())
        .then(response => {
            if(response){
                conPrin.innerHTML = '';
                busqueda(response);
            }
        })
        .catch(e => console.log(e))

    }else{
        alert("Ingresa algo para buscar");
    }

});

const busqueda = (array) =>{
    const contenedorA = `
        <fieldset class="contenedor-anuncios m-c" id="contenedor-anuncios99">
            <legend>Busqueda</legend>
        </fieldset>
        <br><br>
    `;

    conPrin.insertAdjacentHTML('beforeend', contenedorA);

    let conAnuncios = document.getElementById("contenedor-anuncios99");

    array.forEach(e => {
        addAnuncio(
            conAnuncios, 
            e.imagen, 
            e.nombre, 
            e.descripcion, 
            e.precio,
            e.idp
        );
    });
}

const getAllCat = () =>{
    const URL =  `http://localhost/Y-LStore/mysql/getCategory.php`;

    fetch(URL)
        .then(response => response.json())
        .then(response => {
            if(response.length != 0){
                response.forEach(e => {
                    addCategoriaAnuncio(e.idca, e.categoria);
                });
            }
        })
}

getAllCat();

const addCategoriaAnuncio = (idca, nombre) =>{
    const contenedorA = `
        <fieldset class="contenedor-anuncios" id="contenedor-anuncios${idca}">
            <legend>${nombre}</legend>
        </fieldset>
        <br><br>
    `;

    conPrin.insertAdjacentHTML('beforeend', contenedorA);

    let conAnuncios = document.getElementById("contenedor-anuncios" + idca);

    const URL =  `http://localhost/Y-LStore/mysql/getArtCategory.php?idca=${idca}`;

    fetch(URL)
        .then(response => response.json())
        .then(response => {
            if(response){
                response.forEach(e => {
                    addAnuncio(
                        conAnuncios, 
                        e.imagen, 
                        e.nombre, 
                        e.descripcion, 
                        e.precio,
                        e.idp
                    );
                });
            }
        })    
}

const addAnuncio = (c, i, n, d, p, id) =>{
    const an = `
        <div class="anuncio">

            <div class="box-nor-img">
                <img src="img/${i}" class="size-nor">
            </div>
            
            <div class="contenido-anuncio">
                <h4>${n}</h4>
                <p>${d}</p>
                <p class="precio">$ ${p}</p>
                
                <a href="home.php?op=10&i=${id}" class="boton boton-az d-block">Ver Articulo</a>
            </div>

        </div>
    `;

    c.insertAdjacentHTML('beforeend', an);
}
