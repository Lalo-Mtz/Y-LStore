<?php
    session_start();
    include("mysql.php");


    //if($_SESSION['registered'] == true){
        $conn = connect();

        $nom = $_GET['n'];

        $sql = "SELECT idu, nombre, ape_pat FROM usuario WHERE tipo != 1";

        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }

        close($conn);
        
        echo json_encode($array);
    //}
?>