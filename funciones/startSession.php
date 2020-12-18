<?php
    session_start();
    include("../mysql/mysql.php"); //Incluye los funciones mysql

    if($_POST){
        $btn = 0;

        if(strcmp($_POST['btn'],'Sign up') == 0){
            if(!newUser($_POST['usr'], $_POST['em'], $_POST['pwd'], 0)){
                header('Location: ../index.html');
            }
            $btn = 1;
        }


        $validate = login($_POST['usr'], $_POST['pwd']); //Envia el password y el username para verificar que este registrado y 
        //el password sea correcto, si no es correcto o no existe retorna 0

        if(@$_SESSION['registered'] != true && $validate != 0){ //Verifica que no hay una sesion abierta y valida que se regresaron los datos del usuario
            $_SESSION['registered'] = true; //Gurarda los datos del usuario para ya no hacer consultas.
            $_SESSION['username'] = $_POST['usr'];
            $_SESSION['id'] = $validate[0];
            $_SESSION['type'] = $validate[1];
            $_SESSION['email'] = $validate[2];

            $location = $btn == 1 ? '5' : '0';

            header("Location: ../home.php?op=$location"); //Entra al home
        }else{
            header("Location: ../index.html"); //Si no existe o no es valido regresa al index
        }
    }
?>