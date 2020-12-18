<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idu = $_GET['iu'];
        $mon = $_GET['m'];
        $can = $_GET['c'];
        $fecha_hora = date('Y-m-d H:i:s');

        $sql = "INSERT INTO compra(idu, monto, articulos, fecha_hora) VALUES($idu,$mon,$can, '$fecha_hora')";

        if($conn->query($sql) === true){
            $sql = "SELECT * FROM compra WHERE idu = $idu 
                    ORDER BY idc DESC
                    LIMIT 0, 1;";

            $result = $conn->query($sql)->fetch_assoc();
        }

        close($conn);
        echo json_encode($result);
    //}
?>