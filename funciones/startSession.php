<?php
    session_start();
    include("mysql/mysql.php"); //Incluye los funciones mysql
    if($_POST){
        $conn = connect(); //conecta a la base de datos
        $validate = login($_POST['username'], $_POST['pwd'], $conn); //Envia el password y el username para verificar que este registrado y 
        //el password sea correcto, si no es correcto o no existe retorna 0

        if(@$_SESSION['registro'] != true && $validate != 0){ //Verifica que no hay una sesion abierta y valida que se regresaron los datos del usuario
            $_SESSION['registro'] = true; //Gurarda los datos del usuario para ya no hacer consultas.
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $validate[0];
            $_SESSION['type'] = $validate[1];
            header('Location: home.php'); //Entra al home
        }else{
            header('Location: index.php'); //Si no existe o no es valido regresa al index
        }
        close($conn);//Cierra la conexion
    }
?>