<?php
    session_start();
    include("mysql.php");

    if($_SESSION['registered'] == true){
        $conn = connect();

        $id = $_GET['i'];


        $sql = "DELETE FROM producto WHERE idp=$id";

        if($conn->query($sql) === false){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        close($conn);
        
    }//else{
    //    header('Location : home.php?op=5');
    //}
    header("Location: ../home.php?op=3");

?>