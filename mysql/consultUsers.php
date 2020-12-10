<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $n = $_GET['n'];
        $c = $_GET['c'];
        $id = $_GET['i'];
        $op = $_GET['o'];

        switch($op){
            case 1 :
                $complete = "idu = $id";
            break;

            case 2 :
                $complete = "nombre LIKE '%$n%'";
            break;

            case 3 :
                $complete = "email LIKE '%$c%'";
            break;

            case 4 :
                $complete = "nombre LIKE '%$n%' AND email LIKE '%$c%'";
            break;

            default :
                $complete = "";
            break;
        }


        $sql = "SELECT * FROM usuario WHERE " . $complete;

        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }

        close($conn);
        
        echo json_encode($array);
    //}
?>