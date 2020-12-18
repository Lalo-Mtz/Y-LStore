<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idc = $_GET['ic'];
        $idp = $_GET['ip'];
        $can = $_GET['c'];

        $sql = "INSERT INTO contiene(idc, idp, cantidad) VALUES($idc,$idp,$can)";

        $respo = "false";

        if($conn->query($sql) === true){
            $sql = "SELECT existencia FROM producto WHERE idp = $idp";
            $cant = ($conn->query($sql)->fetch_assoc())['existencia'];

            $cant -= $can;

            $sql = "UPDATE producto SET existencia=$cant WHERE idp=$idp";
            if($conn->query($sql) === true){
                $respo = "true";
            }
        }

        close($conn);
        echo $respo;
    //}
?>