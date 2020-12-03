<?php
    function settings(){
        echo '
        <br>
            <h1 class="centrar-texto">Informacion de la cuenta</h1>
            
            <section class="settings">
                <form action="mysql/saveInfoUser.php" method="POST">
                    <fieldset >
                        <legend>Informacion Personal</legend>
                        <input type="hidden" name="idu" id="idu" value="'.$_SESSION['id'].'">
                        <label for="uname">Nombre:</label>
                        <input type="text" name="uname" id="uname" placeholder="Tu nombre" value="'.$_SESSION['username'].'">
        
                        <label for="apepat">Apellido Paterno:</label>
                        <input type="text" name="apepat" id="apepat" placeholder="Primer apellido">
        
                        <label for="apemat">Apellido Materno:</label>
                        <input type="text" name="apemat" id="apemat" placeholder="Segundo apellido">
        
                        <label for="birthdate">Fecha de nacimiento:</label>
                        <input type="date" name="birthdate" id="birthdate">
        
                        <label for="mail">E-mail:</label>
                        <input type="email" name="mail" id="mail" placeholder="Tu e-mail" value="'.$_SESSION['email'].'">
        
                        <label for="phone">Teléfono:</label>
                        <input type="tel" name="phone" id="phone" placeholder="Tu numero de telefono">
        
                        <label for="">Gustos</label>
                    </fieldset>
        
                    <fieldset class="domicilio">
                        <legend>Domicilio</legend>
                        <label for="calle">Calle:</label>
                        <input type="text" name="calle" id="calle" placeholder="Tu calle">
        
                        <div class="nums">
                            <div>
                                <label for="ext">Número exterior:</label>
                                <input type="number" name="ext" id="ext" placeholder="xxx">
                            </div>
        
                            <div>
                                <label for="inte">Número interior:</label>
                                <input type="number" name="inte" id="inte" placeholder="yyy">
                            </div>
        
                            <div>
                                <label for="cp">Código Postal:</label>
                                <input type="number" name="cp" id="cp" placeholder="zzzzz">
                            </div>
                        </div>
        
                        <label for="co">Colonia:</label>
                        <input type="text" name="co" id="co" placeholder="Tu colonia">
        
                        <label for="ci">Ciudad:</label>
                        <input type="text" name="ci" id="ci" placeholder="Tu ciudad">
        
                        <label for="es">Estado:</label>
                        <input type="text" name="es" id="es" placeholder="Tu estado">
                    </fieldset>
        
        
                    <input type="submit" value="Guardar" class="btn">
                </form>
            </section>
            <script src="js/searchUser.js"></script>';
    }
?>