<?php
    session_start();
    if(@$_SESSION['registered'] == true){
        $_SESSION['registered'] = false;
        session_unset();
        session_destroy();
    }
    header('Location: ../index.html'); //Redirige al index
?>