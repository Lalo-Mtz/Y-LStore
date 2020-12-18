<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idp = $_GET['ip'];
        $idu = $_GET['iu'];
        $msg = $_GET['msg'];

        $sql = "INSERT INTO comenta(idu, idp, comentario) values($idu,$idp,'$msg')";

        $respo = "false";

        if($conn->query($sql) === true){
            $respo = "true";
        }

        close($conn);
        echo $respo;
    //}
?>