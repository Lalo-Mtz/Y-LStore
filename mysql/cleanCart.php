<?php
     session_start();
     include("mysql.php");
 
     //if($_SESSION['registered'] == true){
         $conn = connect();
 
         $idu = $_GET['iu'];
 
         $sql = "DELETE FROM carrito WHERE idu = $idu";
 
         $result = "false";
         if($conn->query($sql) === true){
            $result = "true";
         }
 
         close($conn);
         echo $result;
     //}
?>