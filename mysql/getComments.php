<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idp = $_GET['ip'];

        $sql = "SELECT cm.*, us.nombre, us.ape_pat FROM comenta cm INNER JOIN usuario us ON cm.idu = us.idu WHERE cm.idp=$idp";

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }

        close($conn);

        echo json_encode($array);
    //}
?>