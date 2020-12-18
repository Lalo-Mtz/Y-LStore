<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idu = $_GET['iu'];
        $idp = $_GET['ip'];
        $can = $_GET['can'];

        $sql = "UPDATE carrito SET cantidad=$can WHERE idu=$idu AND idp=$idp";

        $respo = "false";

        if($conn->query($sql) === true){
            $respo = "true";
        }

        close($conn);
        echo $respo;
    //}
?>