<?php
    session_start();
    include("mysql.php");


    //if($_SESSION['registered'] == true){
        $conn = connect();

        $idca = $_GET['idca'];

        $sql = "SELECT * FROM producto WHERE idca=$idca";

        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }

        close($conn);
        
        echo json_encode($array);
    //}
?>