<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $sql = "SELECT * FROM categoria;";

        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()){
            $array[] = $row['categoria'];
        }

        close($conn);
        
        echo json_encode($array);
    //}
?>