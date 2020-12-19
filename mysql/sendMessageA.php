<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idu = $_GET['idu'];
        $men = $_GET['m'];
        $tipo = $_GET['t'];
        $fecha_hora = date('Y-m-d H:i:s');

        $sql = "INSERT INTO mensaje (idu, mgs, fecha_hora, state) VALUES ($idu,'$men','$fecha_hora', $tipo)";
        
        $result = "false";

        if($conn->query($sql) === true){
            $result = "true";
        }

        close($conn);

        echo json_encode($result);
    //}
?>