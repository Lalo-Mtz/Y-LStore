<?php
    function carrito(){
        echo '
            <br>
            <section class="v-h" id="art-box">
            <input type="hidden" name="idu" id="idu" value="'.$_SESSION['id'].'" required>
                <h1 class="centrar-texto">Carrito</h1>

                <div class="box-car" id="car-box"></div>

            </section>
            <br><br>
            <script src="js/carPage.js"></script>
        ';
    }

    function settings(){
        echo '
        <br>
            <h1 class="centrar-texto">Información de la cuenta</h1>
            
            <section class="settings">
                <form action="mysql/saveInfoUser.php" method="POST" name="fromInfo">
                    <fieldset >
                        <legend>Información Personal</legend>
                        <input type="hidden" name="idu" id="idu" value="'.$_SESSION['id'].'" required>
                        <label for="uname">Nombre:</label>
                        <input type="text" name="uname" id="uname" placeholder="Tu nombre" value="'.$_SESSION['username'].'">
        
                        <label for="apepat">Apellido Paterno:</label>
                        <input type="text" name="apepat" id="apepat" placeholder="Primer apellido" required>
        
                        <label for="apemat">Apellido Materno:</label>
                        <input type="text" name="apemat" id="apemat" placeholder="Segundo apellido" required>
        
                        <label for="birthdate">Fecha de nacimiento:</label>
                        <input type="date" name="birthdate" id="birthdate" required>
        
                        <label for="mail">E-mail:</label>
                        <input type="email" name="mail" id="mail" placeholder="Tu e-mail" value="'.$_SESSION['email'].'" required>
        
                        <label for="phone">Teléfono:</label>
                        <input type="tel" name="phone" id="phone" placeholder="Tu numero de telefono" required>
        
                        <label for="">Gustos</label>
                        <div class="like" id="like"></div>
                        <input type="checkbox" class="no-visibleF" id="activa" checked>
                    </fieldset>
        
                    <fieldset class="domicilio">
                        <legend>Domicilio</legend>
                        <label for="calle">Calle:</label>
                        <input type="text" name="calle" id="calle" placeholder="Tu calle" required>
        
                        <div class="nums">
                            <div>
                                <label for="ext">Número exterior:</label>
                                <input type="number" name="ext" id="ext" placeholder="xxx" required>
                            </div>
        
                            <div>
                                <label for="inte">Número interior:</label>
                                <input type="number" name="inte" id="inte" placeholder="yyy" >
                            </div>
        
                            <div>
                                <label for="cp">Código Postal:</label>
                                <input type="number" name="cp" id="cp" placeholder="zzzzz" required>
                            </div>
                        </div>
        
                        <label for="co">Colonia:</label>
                        <input type="text" name="co" id="co" placeholder="Tu colonia" required>
        
                        <label for="ci">Ciudad:</label>
                        <input type="text" name="ci" id="ci" placeholder="Tu ciudad" required>
        
                        <label for="es">Estado:</label>
                        <input type="text" name="es" id="es" placeholder="Tu estado" required>
                    </fieldset>
        
        
                    <input type="button" value="Guardar" class="btn" onclick="incrementaG()">
                </form>
            </section>
            <script src="js/searchUser.js"></script>';
    }

    function adminProducts(){
        echo '
            <br>
            <h1 class="centrar-texto">Productos</h1>
            <section class="v-h" id="secPro">
                <section class="operaciones">
                    <fieldset class="ope">
                        <legend>Operaciones</legend>
                        <button class="btn op" id="btnBP">Buscar Producto</button>
                        <button class="btn op" id="btnNP">Nuevo Producto</button>
                        <button class="btn op" id="btnAP">Actualizar Producto</button>
                        <button class="btn op" id="btnEP">Eliminar Producto</button>
                        <button class="btn op" id="btnNC">Nueva Categoria</button>
                    </fieldset>
                </section>

                <section class="buscar" id="contentProd">
                </section>
                <section class="buscar">
                    <button class="btn op no-visible" id="seachProduct">Buscar</button>

                    <table border=1 class="list no-visible" id="tablePro">
                        

                    </table>

                </section>
                <br><br>
                <br><br>
            </section>


            <script src="js/adminProducts.js"></script>
        ';
    }

    function settingsProduct(){
        echo '
            <br>
            <h1 class="centrar-texto">Información del Producto</h1>

            <section class="settings">
            <form action="mysql/saveInfoProduct.php" name="formProduct" method="post">
                <fieldset >
                    <legend>Información del Producto</legend>
                    <input type="hidden" name="idp" id="idp" value="'.$_GET['i'].'" required>
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" placeholder="Nombre del prodcuto" required>

                    <label for="des">Descripción:</label>
                    <textarea name="des" id="des" required></textarea>

                    <label for="price">Precio:</label>
                    <input type="number" name="price" id="price" placeholder="Precio del producto" required>

                    <label for="exi">Existencia:</label>
                    <input type="number" name="exi" id="exi" placeholder="Cantidad del producto" required>

                    <label for="category">Categoría:</label>
                    <select name="category" id="category" required>
                        <option value="nothing" disabled selected>--Seleccione--</option>
                    </select>

                    <label for="img">Imagen:</label>
                    <input type="text" name="img" id="img" placeholder="Imagen del producto" required>
                    
                </fieldset>


                <input type="submit" value="Guardar" class="btn">
            </form>
        </section>
        <script src="js/searchProduct.js"></script>
        ';
    }

    function newProduct(){
        echo '
            <br>
            <h1 class="centrar-texto">Nuevo Producto</h1>

            <section class="settings">
                <form action="mysql/newProduct.php" name="formProduct" method="post">
                    <fieldset >
                        <legend>Información del Producto</legend>

                        <label for="name">Nombre:</label>
                        <input type="text" name="name" id="name" placeholder="Nombre del prodcuto" required>

                        <label for="des">Descripción:</label>
                        <textarea name="des" id="des" required></textarea>

                        <label for="price">Precio:</label>
                        <input type="number" step="any" name="price" id="price" placeholder="Precio del producto" required>

                        <label for="exi">Existencia:</label>
                        <input type="number" name="exi" id="exi" placeholder="Cantidad del producto" required>

                        <label for="category">Categoría:</label>
                        <select name="category" id="category" required>
                            <option value="nothing" disabled selected>--Seleccione--</option>
                        </select>

                        <label for="img">Imagen:</label>
                        <input type="text" name="img" id="img" placeholder="Imagen del producto" required>
                        
                    </fieldset>


                    <input type="submit" value="Guardar" class="btn">
                </form>
            </section>
            <script src="js/searchCategory.js"></script>
        ';
    }

    function adminUsers(){
        echo '
            <br>
            <h1 class="centrar-texto">Usuarios</h1>
            <section class="v-h" id="secUsu">
                <section class="operaciones">
                    <fieldset class="ope">
                        <legend>Operaciones</legend>
                        <button class="btn op" id="btnBU">Buscar Usuario</button>
                        <button class="btn op" id="btnNU">Nuevo usuario</button>
                        <button class="btn op" id="btnAU">Actualizar Usuario</button>
                        <button class="btn op" id="btnEU">Eliminar Usuario</button>
                    </fieldset>
                </section>

                <section class="buscar" id="contentUsu">
                </section>
                <section class="buscar">
                    <button class="btn op no-visible" id="seachUser">Buscar</button>

                    <table border=1 class="list no-visible" id="tableUsu">
                        

                    </table>

                </section>
                <br><br>
                <br><br>
            </section>


            <script src="js/adminUsers.js"></script>
        ';
    }

    function settingsUser(){
        echo '
        <br>
            <h1 class="centrar-texto">Información de la cuenta</h1>
            
            <section class="settings">
                <form action="mysql/updateUser.php" method="POST">
                    <fieldset >
                        <legend>Información Personal</legend>
                        <input type="hidden" name="idu" id="idu" value="'.$_GET['i'].'" required>
                        <label for="uname">Nombre:</label>
                        <input type="text" name="uname" id="uname" placeholder="Tu nombre">
        
                        <label for="apepat">Apellido Paterno:</label>
                        <input type="text" name="apepat" id="apepat" placeholder="Primer apellido" required>
        
                        <label for="apemat">Apellido Materno:</label>
                        <input type="text" name="apemat" id="apemat" placeholder="Segundo apellido" required>
        
                        <label for="birthdate">Fecha de nacimiento:</label>
                        <input type="date" name="birthdate" id="birthdate" required>
        
                        <label for="mail">E-mail:</label>
                        <input type="email" name="mail" id="mail" placeholder="Tu e-mail" required>
        
                        <label for="phone">Teléfono:</label>
                        <input type="tel" name="phone" id="phone" placeholder="Tu numero de telefono" required>

                        <label for="roluser">Rol:</label>
                        <select name="roluser" id="roluser" required>
                            <option value="0" disabled selected>--Seleccione--</option>
                            <option value="1">Administrador</option>
                            <option value="0">Usuario</option>
                        </select>
                    </fieldset>
        
                    <fieldset class="domicilio">
                        <legend>Domicilio</legend>
                        <label for="calle">Calle:</label>
                        <input type="text" name="calle" id="calle" placeholder="Tu calle" required>
        
                        <div class="nums">
                            <div>
                                <label for="ext">Número exterior:</label>
                                <input type="number" name="ext" id="ext" placeholder="xxx" required>
                            </div>
        
                            <div>
                                <label for="inte">Número interior:</label>
                                <input type="number" name="inte" id="inte" placeholder="yyy" >
                            </div>
        
                            <div>
                                <label for="cp">Código Postal:</label>
                                <input type="number" name="cp" id="cp" placeholder="zzzzz" required>
                            </div>
                        </div>
        
                        <label for="co">Colonia:</label>
                        <input type="text" name="co" id="co" placeholder="Tu colonia" required>
        
                        <label for="ci">Ciudad:</label>
                        <input type="text" name="ci" id="ci" placeholder="Tu ciudad" required>
        
                        <label for="es">Estado:</label>
                        <input type="text" name="es" id="es" placeholder="Tu estado" required>
                    </fieldset>
        
        
                    <input type="submit" value="Guardar" class="btn">
                </form>
            </section>
            <script src="js/searchUsers.js"></script>';
    }

    function newUser(){
        echo '
        <br>
            <h1 class="centrar-texto">Información de la nueva cuenta</h1>
            
            <section class="settings">
                <form action="mysql/newUser.php" method="POST">
                    <fieldset >
                        <legend>Información Personal</legend>
                        <label for="uname">Nombre:</label>
                        <input type="text" name="uname" id="uname" placeholder="Tu nombre">
        
                        <label for="apepat">Apellido Paterno:</label>
                        <input type="text" name="apepat" id="apepat" placeholder="Primer apellido" required>
        
                        <label for="apemat">Apellido Materno:</label>
                        <input type="text" name="apemat" id="apemat" placeholder="Segundo apellido" required>
        
                        <label for="birthdate">Fecha de nacimiento:</label>
                        <input type="date" name="birthdate" id="birthdate" required>
        
                        <label for="mail">E-mail:</label>
                        <input type="email" name="mail" id="mail" placeholder="Tu e-mail" required>
        
                        <label for="phone">Teléfono:</label>
                        <input type="tel" name="phone" id="phone" placeholder="Tu numero de telefono" required>

                        <label for="roluser">Rol:</label>
                        <select name="roluser" id="roluser" required>
                            <option value="0" disabled selected>--Seleccione--</option>
                            <option value="1">Administrador</option>
                            <option value="0">Usuario</option>
                        </select>

                        <label for="pwd">Contraseña:</label>
                        <input type="password" name="pwd" id="pwd" placeholder="Password" required>

                        <label for="">Gustos</label>
                    </fieldset>
        
                    <input type="submit" value="Guardar" class="btn">
                </form>
            </section>';
    }

    function venta(){
        echo '
            <section class="cont-producto m-c">
            <br><br>
            <input type="hidden" name="idp" id="idp" value="'.$_GET['i'].'" required>
            <input type="hidden" name="idu" id="idu" value="'.$_SESSION['id'].'" required>
            <input type="hidden" name="userName" id="userName" value="'.$_SESSION['username'].'" required>
                <fieldset>
                    <div class="info-pro">
                        <div class="img-pro">
                            <img alt="Imagen del producto" id="img-product">
                        </div>

                        <fieldset class="esp-pro">
                            <h4 id="name"></h4>
                            <p>calif</p>

                            <p class="precio"><span id="precio">$ </span></p>

                            <p id="des"></p>

                            <p>Stock disponible: <span id="exi"></span></p>
                            

                            <p>Cantidad:</p>
                            <select name="can-p" id="can-p">
                                <option value="0" disabled selected >--Seleccione--</option>
                            </select>

                            <div class="space-btns">
                                <button class="btn cmp" id="comprar">Comprar ahora</button>
                                <button class="btn ac" id="agregar">Agregar al carrito</button>
                            </div>
                        </fieldset>
                    </div>
                    

                    <h3 class="centrar-texto">Sección de comentarios</h3>
                    <section>
                        <label for="cmt">Escribe tu comentario:</label>
                        <div class="caja-com">
                            <textarea class="are-com" id="txtarea"></textarea>
                            <button class="btn cmp" id="btnEnviarCom">Enviar</button>
                        </div>
                    </section>

                    <section class="area-come" id="comments">
                        

                        
                    </section>
                </fieldset>
                <br><br>
            </section>

            <script src="js/salepage.js"></script>
        ';
    }

    function inicio(){
        echo '
            <section class="contenedor-principal m-c">
            <br><br>
                <div class="buscar-pr">

                    <input type="text" name="busca" id="busca">

                    <div class="imagen-b">
                        <button id="btn-buscar-A"><img src="img/buscar.png" alt="Imagen buscar"></button>
                    </div>
                </div>

                <div id="con-princi"></div>         

            
            </section>

            <script src="js/principal.js"></script>
        ';
    }
?>