<?php
    function settings(){
        echo '
        <br>
            <h1 class="centrar-texto">Información de la cuenta</h1>
            
            <section class="settings">
                <form action="mysql/saveInfoUser.php" method="POST">
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
                    <button class="btn op no-visible" id="seachProduct">Buscar</button>

                    <table border=1 class="list no-visible" id="tablePro">
                        <tr class="row-one">
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Descripción</td>
                            <td>Precio</td>
                            <td>Exixtencia</td>
                            <td>Categoría</td>
                            <td>Calificación</td>
                            <td>Imagen</td>
                        </tr>

                    </table>

                </section>
                <br><br>
                <br><br>
            </section>


            <script src="js/adminProducts.js"></script>
        ';
    }
?>