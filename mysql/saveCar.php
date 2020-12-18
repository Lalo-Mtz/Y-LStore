<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idp = $_GET['ip'];
        $idu = $_GET['iu'];
        $can = $_GET['cant'];

        $sql = "INSERT INTO carrito(idu, idp, cantidad) values($idu,$idp,$can)";

        $respo = "false";

        if($conn->query($sql) === true){
            $respo = "true";
        }

        close($conn);
        echo $respo;
    //}
?>