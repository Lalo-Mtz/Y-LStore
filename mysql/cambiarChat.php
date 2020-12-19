<?php
     session_start();
 
     //if($_SESSION['registered'] == true){

        $result = "true";
        $_SESSION['chat'] = $_GET['idu'];

        echo json_encode($result);
     //}
?>