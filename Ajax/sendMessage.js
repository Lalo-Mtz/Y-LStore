const sendMe = document.getElementById("sendMe"),
    //msg = document.getElementById("mens"),
    idu = document.getElementById("idu").value,
    tipo = document.getElementById("tipo").value,
    convList = document.getElementById("conversation-list");

let iduEn = 0;

sendMe.addEventListener('keyup', e =>{
    if(e.keyCode === 13){
        if(iduEn != 0){

            if(sendMe.value != ""){
                message = `${sendMe.value}`;

                if(tipo == 1){
                    urlv = `http://localhost/Y-LStore/mysql/sendMessageA.php?idu=${iduEn}&t=${tipo}&m=${sendMe.value}`;
                }else{
                    urlv = `http://localhost/Y-LStore/mysql/sendMessageA.php?idu=${idu}&t=${tipo}&m=${sendMe.value}`;
                }


                fetch(urlv)
                    .then(response => response.json())
                    .then(response => {
                        console.log(response);
                        if(response){
                            sendMe.value = '';
                        }
                    })
            }else{
                alert("El campo esta vacio!!");
            }

        }else{
            alert("No se a seleccionado algún usuario.");
        }
    }
});

const getUsuarios = () =>{
    if(tipo == 1){
        const URL = `http://localhost/Y-LStore/mysql/getUser.php`;
        
        fetch(URL)
            .then(response => response.json())
            .then(response => {
                if(response){
                    response.forEach(e => {
                        addChatUsu(
                            e.idu,
                            e.nombre + " " +e.ape_pat
                        ); 
                    });
                }
            })
            .catch(e => console.log(e))
    }else{
        iduEn = -1;    
    }
}

const addChatUsu = (idu, nombre) =>{
    const usu = `
        <div class="conversation">
            <img src="../img/user-solid.svg" alt="user">
            <div class="title-text" onclick="getMessagesU(${idu})">
                ${nombre}
            </div>
            <div class="created-date">
                Apr 16
            </div>
            <div class="conversation-message">
                This is the massage
            </div>
        </div>
    `;

    convList.insertAdjacentHTML('beforeend', usu);
}

const getMessagesU = (id) =>{
    const URL = `http://localhost/Y-LStore/mysql/cambiarChat.php?idu=${id}`;
    iduEn = id;
    fetch(URL)
        .then(response => response.json())
        .catch(e => console.log(e))
}

getUsuarios();