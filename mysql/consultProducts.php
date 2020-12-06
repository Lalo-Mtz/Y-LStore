<?php
    session_start();
    include("mysql.php");

    //if($_SESSION['registered'] == true){
        $conn = connect();

        $n = $_GET['n'];
        $c = $_GET['c'];
        $mi = $_GET['mi'];
        $ma = $_GET['ma'];
        $op = $_GET['o'];

        switch($op){
            case 1 :
                $complete = "nombre LIKE '%$n%'";
            break;

            case 2 :
                $complete = "nombre LIKE '%$n%' AND categoria like '%$c%'";
            break;

            case 3 :
                $complete = "nombre LIKE '%$n%' AND categoria like '%$c%' AND precio >= $mi AND precio <= $ma";
            break;

            case 4 :
                $complete = "categoria like '%$c%'";
            break;

            case 5 :
                $complete = "precio >= $mi AND precio <= $ma";
            break;

            case 6 :
                $complete = "categoria like '%$c%' AND precio >= $mi AND precio <= $ma";
            break;

            default :
                $complete = "";
            break;
        }


        $sql = "SELECT producto.*, categoria.categoria FROM producto NATURAL JOIN categoria WHERE " . $complete;

        $result = $conn->query($sql);
    
        while($row = $result->fetch_assoc()){
            $array[] = $row;
        }

        close($conn);
        
        echo json_encode($array);
    //}
?>