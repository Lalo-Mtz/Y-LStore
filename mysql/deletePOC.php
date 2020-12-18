<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idu = $_GET['iu'];
        $idp = $_GET['ip'];

        $sql = "DELETE FROM carrito WHERE idu = $idu AND idp = $idp";

        $result = false;
        if($conn->query($sql) === true){
           $result = true;
        }

        if($result){
            header("Location: ../home.php?op=1");
        }
    //}
?>