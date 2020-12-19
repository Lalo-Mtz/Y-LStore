<?php
    session_start();
    include("mysql.php");


    //if($_SESSION['registered'] == true){
        $conn = connect();

        $nom = $_GET['n'];

        $sql = "SELECT * FROM producto INNER JOIN categoria ON producto.idca = categoria.idca 
                WHERE nombre LIKE '%$nom%' OR categoria LIKE '%$nom%'";

        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }

        close($conn);
        
        echo json_encode($array);
    //}
?>