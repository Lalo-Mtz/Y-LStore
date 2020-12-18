<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idu = $_GET['iu'];

        $sql = "SELECT ca.cantidad, pro.*  FROM carrito ca INNER JOIN producto pro ON ca.idp = pro.idp WHERE ca.idu = $idu";

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }

        close($conn);

        echo json_encode($array);
    //}
?>